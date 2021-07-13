<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713133037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothque (id INT AUTO_INCREMENT NOT NULL, num_mus_id INT DEFAULT NULL, isbn_id INT DEFAULT NULL, date_achat DATETIME NOT NULL, INDEX IDX_94F39A206D319670 (num_mus_id), INDEX IDX_94F39A20AFFF1118 (isbn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrage (id INT AUTO_INCREMENT NOT NULL, codepays_id INT DEFAULT NULL, isbn VARCHAR(255) NOT NULL, nb_page INT NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_52A8CBD82051FD65 (codepays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referencier (id INT AUTO_INCREMENT NOT NULL, site_nom_id INT DEFAULT NULL, isbn_id INT DEFAULT NULL, numero_page INT NOT NULL, INDEX IDX_80AD726CB8BCB2B6 (site_nom_id), INDEX IDX_80AD726CAFFF1118 (isbn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, code_pays_id INT DEFAULT NULL, nom_site VARCHAR(255) NOT NULL, anneedecouv DATETIME NOT NULL, INDEX IDX_694309E49E4306D8 (code_pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothque ADD CONSTRAINT FK_94F39A206D319670 FOREIGN KEY (num_mus_id) REFERENCES musee (id)');
        $this->addSql('ALTER TABLE bibliothque ADD CONSTRAINT FK_94F39A20AFFF1118 FOREIGN KEY (isbn_id) REFERENCES ouvrage (id)');
        $this->addSql('ALTER TABLE ouvrage ADD CONSTRAINT FK_52A8CBD82051FD65 FOREIGN KEY (codepays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE referencier ADD CONSTRAINT FK_80AD726CB8BCB2B6 FOREIGN KEY (site_nom_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE referencier ADD CONSTRAINT FK_80AD726CAFFF1118 FOREIGN KEY (isbn_id) REFERENCES ouvrage (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E49E4306D8 FOREIGN KEY (code_pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE moment CHANGE jour jour VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bibliothque DROP FOREIGN KEY FK_94F39A20AFFF1118');
        $this->addSql('ALTER TABLE referencier DROP FOREIGN KEY FK_80AD726CAFFF1118');
        $this->addSql('ALTER TABLE referencier DROP FOREIGN KEY FK_80AD726CB8BCB2B6');
        $this->addSql('DROP TABLE bibliothque');
        $this->addSql('DROP TABLE ouvrage');
        $this->addSql('DROP TABLE referencier');
        $this->addSql('DROP TABLE site');
        $this->addSql('ALTER TABLE moment CHANGE jour jour DATETIME NOT NULL');
    }
}
