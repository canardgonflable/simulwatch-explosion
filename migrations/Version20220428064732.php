<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428064732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_genre ADD mal_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17EF0199490AB743 ON sylius_genre (mal_id)');
        $this->addSql('ALTER TABLE sylius_studio ADD mal_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_700AE94A490AB743 ON sylius_studio (mal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_17EF0199490AB743 ON sylius_genre');
        $this->addSql('ALTER TABLE sylius_genre DROP mal_id');
        $this->addSql('DROP INDEX UNIQ_700AE94A490AB743 ON sylius_studio');
        $this->addSql('ALTER TABLE sylius_studio DROP mal_id');
    }
}
