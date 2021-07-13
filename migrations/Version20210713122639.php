<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713122639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE moment (id INT AUTO_INCREMENT NOT NULL, jour DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiter (id INT AUTO_INCREMENT NOT NULL, num_musee_id INT DEFAULT NULL, jour_id INT DEFAULT NULL, nb_visiteurs INT NOT NULL, INDEX IDX_300A0915135008 (num_musee_id), INDEX IDX_300A0915220C6AD0 (jour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visiter ADD CONSTRAINT FK_300A0915135008 FOREIGN KEY (num_musee_id) REFERENCES musee (id)');
        $this->addSql('ALTER TABLE visiter ADD CONSTRAINT FK_300A0915220C6AD0 FOREIGN KEY (jour_id) REFERENCES moment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiter DROP FOREIGN KEY FK_300A0915220C6AD0');
        $this->addSql('DROP TABLE moment');
        $this->addSql('DROP TABLE visiter');
    }
}
