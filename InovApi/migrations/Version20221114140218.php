<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221114140218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test_user (test_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_88EAFC861E5D0459 (test_id), INDEX IDX_88EAFC86A76ED395 (user_id), PRIMARY KEY(test_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test_user ADD CONSTRAINT FK_88EAFC861E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_user ADD CONSTRAINT FK_88EAFC86A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test_user DROP FOREIGN KEY FK_88EAFC861E5D0459');
        $this->addSql('ALTER TABLE test_user DROP FOREIGN KEY FK_88EAFC86A76ED395');
        $this->addSql('DROP TABLE test_user');
    }
}
