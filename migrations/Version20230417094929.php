<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417094929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE versement (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, montant_verse DOUBLE PRECISION NOT NULL, date_verse DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_716E9367AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE versement ADD CONSTRAINT FK_716E9367AB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE versement DROP FOREIGN KEY FK_716E9367AB014612');
        $this->addSql('DROP TABLE versement');
    }
}
