<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509091041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beet ADD meet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE beet ADD CONSTRAINT FK_B195C3983BBBF66 FOREIGN KEY (meet_id) REFERENCES meet (id)');
        $this->addSql('CREATE INDEX IDX_B195C3983BBBF66 ON beet (meet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beet DROP FOREIGN KEY FK_B195C3983BBBF66');
        $this->addSql('DROP INDEX IDX_B195C3983BBBF66 ON beet');
        $this->addSql('ALTER TABLE beet DROP meet_id');
    }
}
