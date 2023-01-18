<?php

declare(strict_types=1);

namespace App\Command\Import;

use App\Entity\Anime\Anime;
use App\Entity\Anime\Genre;
use App\Entity\Anime\MainPicture;
use App\Entity\Anime\Studio;
use App\Entity\Broadcast\Broadcast;
use App\Entity\Broadcast\StartSeason;
use App\Kernel;
use App\Model\AnimeInterface;
use App\Model\GenreInterface;
use App\Model\StudioInterface;
use App\Repository\Model\AnimeRepositoryInterface;
use App\Repository\Model\GenreRepositoryInterface;
use App\Repository\Model\StudioRepositoryInterface;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Vich\UploaderBundle\FileAbstraction\ReplacingFile;

/**
 * Class ImportAnimeCommand
 * @package App\Command
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class ImportAnimeCommand extends Command
{
    /**
     * ImportAnimeCommand constructor.
     *
     * @param HttpClientInterface       $httpClient
     * @param EntityManagerInterface    $entityManager
     * @param AnimeRepositoryInterface  $animeRepository
     * @param StudioRepositoryInterface $studioRepository
     * @param GenreRepositoryInterface  $genreRepository
     * @param Kernel                    $kernel
     */
    public function __construct(
        protected HttpClientInterface $httpClient,
        protected EntityManagerInterface $entityManager,
        protected AnimeRepositoryInterface $animeRepository,
        protected StudioRepositoryInterface $studioRepository,
        protected GenreRepositoryInterface $genreRepository,
        protected Kernel $kernel

    ) {
        parent::__construct();
    }

    /**
     * Configure command.
     */
    protected function configure(): void
    {
        $this
            ->setName('app:import:anime')
            ->setDescription('Import des animés de la saison')
            ->addArgument('year', InputArgument::REQUIRED, 'L\'année recherchée')
            ->addArgument('season', InputArgument::REQUIRED, 'La saison recherchée (winter, spring, summer, fall)');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $year   = $input->getArgument('year');
        $season = $input->getArgument('season');

        $animeListRequest = $this->httpClient->request(
            'GET',
            'https://api.myanimelist.net/v2/anime/season/'.$year.'/'.$season.'?limit=500',
            [
                'headers' => [
                    'X-MAL-CLIENT-ID' => $_ENV['MAL_API_KEY_PUBLIC'],
                ],
            ]
        );

        $animeListContent = $animeListRequest->toArray();
        $animeMalIds      = [];
        $output->writeln(count($animeListContent['data']).' animes trouvés !');
        $output->writeln('');
        $progressBar = new ProgressBar($output, count($animeListContent['data']));

        foreach ($animeListContent['data'] as $anime) {
            $animeMalIds[] = $anime['node']['id'];
        }

        foreach ($animeMalIds as $animeMalId) {
            $animeDetailsRequest = $this->httpClient->request(
                'GET',
                'https://api.myanimelist.net/v2/anime/'.$animeMalId,
                [
                    'headers' => [
                        'X-MAL-CLIENT-ID' => $_ENV['MAL_API_KEY_PUBLIC'],
                    ],
                    'query'   => [
                        'fields' => 'start_season,synopsis,main_pictures,start_date,end_date,media_type,mean,status,num_episodes,average_episode_duration,rating,studios,broadcast,genres',
                    ],
                ]
            );

            $animeDetailsContent = $animeDetailsRequest->toArray();

            /** @var AnimeInterface $animeRegistered */
            $animeRegistered = $this->animeRepository->findOneBy(['malId' => $animeDetailsContent['id']]);

            if (!$animeRegistered) {
                $animeRegistered = new Anime();
                $animeRegistered->setMalId($animeDetailsContent['id']);
            }

            $animeRegistered->setTitle($animeDetailsContent['title'] ?? null);
            $animeRegistered->setSynopsis($animeDetailsContent['synopsis'] ?? null);
            $animeRegistered->setMalScore($animeDetailsContent['mean'] ?? null);
            $animeRegistered->setStatus($animeDetailsContent['status'] ?? null);
            $animeRegistered->setMediaType($animeDetailsContent['media_type' ?? null]);
            $animeRegistered->setNumberEpisodes($animeDetailsContent['num_episodes'] ?? null);
            $animeRegistered->setAverageEpisodeDuration($animeDetailsContent['average_episode_duration'] ?? null);
            $animeRegistered->setRating($animeDetailsContent['rating'] ?? null);

            if (!empty($animeDetailsContent['start_date'])) {

                $startDate = new DateTime($animeDetailsContent['start_date']);
                $animeRegistered->setStartDate($startDate);
            }

            if (!empty($animeDetailsContent['end_date'])) {
                $endDate = new DateTime($animeDetailsContent['end_date']);
                $animeRegistered->setEndDate($endDate);
            }

            $animeStudiosRegistered = $animeRegistered->getStudios();
            foreach ($animeStudiosRegistered as $animeStudio) {
                $animeRegistered->removeStudio($animeStudio);
            }

            foreach ($animeDetailsContent['studios'] as $studio) {
                /** @var StudioInterface $registeredStudio */
                $registeredStudio = $this->studioRepository->findOneBy(['malId' => $studio['id']]);

                if (!$registeredStudio) {
                    $registeredStudio = new Studio();
                    $registeredStudio->setMalId($studio['id'] ?? null);
                    $registeredStudio->setName($studio['name'] ?? null);
                    $this->entityManager->persist($registeredStudio);
                    $this->entityManager->flush($registeredStudio);
                }
                $animeRegistered->addStudio($registeredStudio);
            }

            $animeGenresRegistered = $animeRegistered->getGenres();
            foreach ($animeGenresRegistered as $animeGenre) {
                $animeRegistered->removeGenre($animeGenre);
            }

            if (!empty($animeDetailsContent['genres'])) {
                foreach ($animeDetailsContent['genres'] as $genre) {
                    /** @var GenreInterface $registeredStudio */
                    $registeredGenre = $this->genreRepository->findOneBy(['malId' => $genre['id']]);

                    if (!$registeredGenre) {
                        $registeredGenre = new Genre();
                        $registeredGenre->setMalId($genre['id'] ?? null);
                        $registeredGenre->setName($genre['name'] ?? null);
                        $this->entityManager->persist($registeredGenre);
                        $this->entityManager->flush($registeredGenre);
                    }
                    $animeRegistered->addGenre($registeredGenre);
                }
            }

            if (!empty($animeDetailsContent['broadcast'])) {
                if (!$broadcast = $animeRegistered->getBroadcast()) {
                    $broadcast = new Broadcast();
                }
                $broadcast->setDayOfTheWeek($animeDetailsContent['broadcast']['day_of_the_week'] ?? null);
                $broadcast->setStartTime($animeDetailsContent['broadcast']['start_time'] ?? null);

                $this->entityManager->persist($broadcast);
                $this->entityManager->flush($broadcast);

                $animeRegistered->setBroadcast($broadcast);
            }

            if (!$startSeason = $animeRegistered->getStartSeason()) {
                $startSeason = new StartSeason();
            }

            if (!empty($animeDetailsContent['start_season'])) {
                $startSeasonYear = new DateTime(
                    $animeDetailsContent['start_season']['year']
                        ? (string)$animeDetailsContent['start_season']['year']
                        : null
                );
                $startSeason->setYear($startSeasonYear);
            }

            $startSeason->setSeason($animeDetailsContent['start_season']['season'] ?? null);

            $this->entityManager->persist($startSeason);
            $this->entityManager->flush($startSeason);

            $animeRegistered->setStartSeason($startSeason);

            $image = new File($animeDetailsContent['main_picture']['large'], false);

            $tmpDir       = $this->kernel->getProjectDir().'/public/media/tmp/';
            $pathToTmpImg = $tmpDir.$image->getFilename();

            file_put_contents($pathToTmpImg, $image->getContent());

            $uploadedImage = new ReplacingFile($pathToTmpImg);

            $mainPicture = new MainPicture();
            $mainPicture->setFile($uploadedImage);

            $this->entityManager->persist($mainPicture);
            $this->entityManager->flush($mainPicture);

            unlink($pathToTmpImg);

            $animeRegistered->setMainPicture($mainPicture);

            $this->entityManager->persist($animeRegistered);
            $this->entityManager->flush($animeRegistered);

            $progressBar->advance();
        }
        $output->writeln('');

        $output->writeln('Terminé !');

        return Command::SUCCESS;
    }
}
