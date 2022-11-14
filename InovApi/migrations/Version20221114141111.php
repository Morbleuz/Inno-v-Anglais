<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221114141111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat ADD utilisateur_id INT NOT NULL, ADD test_id INT NOT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE21E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2FB88E14F ON resultat (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE21E5D0459 ON resultat (test_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2FB88E14F');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE21E5D0459');
        $this->addSql('DROP INDEX IDX_E7DB5DE2FB88E14F ON resultat');
        $this->addSql('DROP INDEX IDX_E7DB5DE21E5D0459 ON resultat');
        $this->addSql('ALTER TABLE resultat DROP utilisateur_id, DROP test_id');
    }
}
