<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220116124941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nekretnina (id INT AUTO_INCREMENT NOT NULL, naslov VARCHAR(255) NOT NULL, opis LONGTEXT NOT NULL, cijena DOUBLE PRECISION NOT NULL, kategorija VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE units');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE units (id INT AUTO_INCREMENT NOT NULL, naslov VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, opis TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cijena DOUBLE PRECISION NOT NULL, kategorija VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE nekretnina');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
