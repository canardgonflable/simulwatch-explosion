<?php

declare(strict_types=1);

namespace App\Command\Notifier;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\ChatMessage;

/**
 * Class NotifyDiscordCommand
 * @package App\Command\Notifier
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class NotifyDiscordCommand extends Command
{
    /**
     * NotifyDiscordCommand constructor.
     *
     * @param ChatterInterface $chatter
     */
    public function __construct(
        protected ChatterInterface $chatter
    ) {
        parent::__construct();
    }

    /**
     * Configure command.
     */
    protected function configure(): void
    {
        $this
            ->setName('app:notify:discord')
            ->setDescription('Test d\'envoi de notification sur Discord')
            ->addArgument('message', InputArgument::REQUIRED, 'Le message de test');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     * @throws TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = $input->getArgument('message');

        $chatMessage = new ChatMessage($message);

        $chatMessage->transport('discord');

        $this->chatter->send($chatMessage);

        return Command::SUCCESS;
    }
}
