<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509090731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beet ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE beet ADD CONSTRAINT FK_B195C398A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_B195C398A76ED395 ON beet (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beet DROP FOREIGN KEY FK_B195C398A76ED395');
        $this->addSql('DROP INDEX IDX_B195C398A76ED395 ON beet');
        $this->addSql('ALTER TABLE beet DROP user_id');
    }
}
