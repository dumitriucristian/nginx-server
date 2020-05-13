<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200513144934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE classroom RENAME INDEX idx_33b1af85c32a47ee TO IDX_497D309DC32A47EE');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C14463F54');
        $this->addSql('DROP INDEX IDX_A9A55A4C14463F54 ON courses');
        $this->addSql('ALTER TABLE courses CHANGE school_class_id classroom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C6278D5A8 ON courses (classroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE classroom RENAME INDEX idx_497d309dc32a47ee TO IDX_33B1AF85C32A47EE');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C6278D5A8');
        $this->addSql('DROP INDEX IDX_A9A55A4C6278D5A8 ON courses');
        $this->addSql('ALTER TABLE courses CHANGE classroom_id school_class_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C14463F54 FOREIGN KEY (school_class_id) REFERENCES classroom (id)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C14463F54 ON courses (school_class_id)');
    }
}
