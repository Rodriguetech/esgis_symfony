<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210706153431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE musee (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, num_mus VARCHAR(255) NOT NULL, nom_mus VARCHAR(255) NOT NULL, nb_livres INT NOT NULL, INDEX IDX_8884C873A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, code_pays VARCHAR(255) NOT NULL, nb_habitant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE musee ADD CONSTRAINT FK_8884C873A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE musee DROP FOREIGN KEY FK_8884C873A6E44244');
        $this->addSql('DROP TABLE musee');
        $this->addSql('DROP TABLE pays');
    }
}
