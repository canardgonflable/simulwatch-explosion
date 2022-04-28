<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427135931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_anime (id INT AUTO_INCREMENT NOT NULL, main_picture_id INT DEFAULT NULL, broadcast_id INT DEFAULT NULL, start_season_id INT DEFAULT NULL, mal_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, simulwatch_score DOUBLE PRECISION DEFAULT NULL, mal_score DOUBLE PRECISION DEFAULT NULL, synopsis VARCHAR(255) DEFAULT NULL, media_type VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, number_episodes INT DEFAULT NULL, average_episode_duration INT DEFAULT NULL, rating VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_87BB6B23490AB743 (mal_id), UNIQUE INDEX UNIQ_87BB6B23D6BDC9DC (main_picture_id), UNIQUE INDEX UNIQ_87BB6B239C7E80E0 (broadcast_id), INDEX IDX_87BB6B2386087A17 (start_season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_animes_genres (anime_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_6CA666F794BBE89 (anime_id), INDEX IDX_6CA666F4296D31F (genre_id), PRIMARY KEY(anime_id, genre_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_animes_studios (anime_id INT NOT NULL, studio_id INT NOT NULL, INDEX IDX_10311AAE794BBE89 (anime_id), INDEX IDX_10311AAE446F285F (studio_id), PRIMARY KEY(anime_id, studio_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_broadcast (id INT AUTO_INCREMENT NOT NULL, day_of_the_week VARCHAR(255) DEFAULT NULL, start_time VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_main_picture (id INT AUTO_INCREMENT NOT NULL, medium VARCHAR(255) DEFAULT NULL, large VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_start_season (id INT AUTO_INCREMENT NOT NULL, year DATETIME DEFAULT NULL, season VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_studio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_anime ADD CONSTRAINT FK_87BB6B23D6BDC9DC FOREIGN KEY (main_picture_id) REFERENCES sylius_main_picture (id)');
        $this->addSql('ALTER TABLE sylius_anime ADD CONSTRAINT FK_87BB6B239C7E80E0 FOREIGN KEY (broadcast_id) REFERENCES sylius_broadcast (id)');
        $this->addSql('ALTER TABLE sylius_anime ADD CONSTRAINT FK_87BB6B2386087A17 FOREIGN KEY (start_season_id) REFERENCES sylius_start_season (id)');
        $this->addSql('ALTER TABLE sylius_animes_genres ADD CONSTRAINT FK_6CA666F794BBE89 FOREIGN KEY (anime_id) REFERENCES sylius_anime (id)');
        $this->addSql('ALTER TABLE sylius_animes_genres ADD CONSTRAINT FK_6CA666F4296D31F FOREIGN KEY (genre_id) REFERENCES sylius_genre (id)');
        $this->addSql('ALTER TABLE sylius_animes_studios ADD CONSTRAINT FK_10311AAE794BBE89 FOREIGN KEY (anime_id) REFERENCES sylius_anime (id)');
        $this->addSql('ALTER TABLE sylius_animes_studios ADD CONSTRAINT FK_10311AAE446F285F FOREIGN KEY (studio_id) REFERENCES sylius_studio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_animes_genres DROP FOREIGN KEY FK_6CA666F794BBE89');
        $this->addSql('ALTER TABLE sylius_animes_studios DROP FOREIGN KEY FK_10311AAE794BBE89');
        $this->addSql('ALTER TABLE sylius_anime DROP FOREIGN KEY FK_87BB6B239C7E80E0');
        $this->addSql('ALTER TABLE sylius_animes_genres DROP FOREIGN KEY FK_6CA666F4296D31F');
        $this->addSql('ALTER TABLE sylius_anime DROP FOREIGN KEY FK_87BB6B23D6BDC9DC');
        $this->addSql('ALTER TABLE sylius_anime DROP FOREIGN KEY FK_87BB6B2386087A17');
        $this->addSql('ALTER TABLE sylius_animes_studios DROP FOREIGN KEY FK_10311AAE446F285F');
        $this->addSql('DROP TABLE sylius_anime');
        $this->addSql('DROP TABLE sylius_animes_genres');
        $this->addSql('DROP TABLE sylius_animes_studios');
        $this->addSql('DROP TABLE sylius_broadcast');
        $this->addSql('DROP TABLE sylius_genre');
        $this->addSql('DROP TABLE sylius_main_picture');
        $this->addSql('DROP TABLE sylius_start_season');
        $this->addSql('DROP TABLE sylius_studio');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
