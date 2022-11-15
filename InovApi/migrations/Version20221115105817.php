<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115105817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liste (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mot (id INT AUTO_INCREMENT NOT NULL, mot_anglais VARCHAR(100) NOT NULL, mot_francais VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mot_liste (mot_id INT NOT NULL, liste_id INT NOT NULL, INDEX IDX_9DC153B963977652 (mot_id), INDEX IDX_9DC153B9E85441D8 (liste_id), PRIMARY KEY(mot_id, liste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, test_id INT NOT NULL, score INT NOT NULL, date DATE NOT NULL, INDEX IDX_E7DB5DE2FB88E14F (utilisateur_id), INDEX IDX_E7DB5DE21E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, lier_id INT NOT NULL, niveau VARCHAR(30) NOT NULL, INDEX IDX_D87F7E0CF7652B75 (lier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, score_total INT NOT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mot_liste ADD CONSTRAINT FK_9DC153B963977652 FOREIGN KEY (mot_id) REFERENCES mot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mot_liste ADD CONSTRAINT FK_9DC153B9E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE21E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF7652B75 FOREIGN KEY (lier_id) REFERENCES liste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mot_liste DROP FOREIGN KEY FK_9DC153B963977652');
        $this->addSql('ALTER TABLE mot_liste DROP FOREIGN KEY FK_9DC153B9E85441D8');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2FB88E14F');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE21E5D0459');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CF7652B75');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE mot');
        $this->addSql('DROP TABLE mot_liste');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
    }
}
