<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501062923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE grade ADD course_id INT NOT NULL');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE34591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_595AAE34591CC992 ON grade (course_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE34591CC992');
        $this->addSql('DROP INDEX IDX_595AAE34591CC992 ON grade');
        $this->addSql('ALTER TABLE grade DROP course_id');
    }
}
