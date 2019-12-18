<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218160054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE testeur ADD maladie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE testeur ADD CONSTRAINT FK_25028C13B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id)');
        $this->addSql('CREATE INDEX IDX_25028C13B4B1C397 ON testeur (maladie_id)');
        $this->addSql('ALTER TABLE maladie DROP FOREIGN KEY FK_ADC4024B127F601C');
        $this->addSql('DROP INDEX IDX_ADC4024B127F601C ON maladie');
        $this->addSql('ALTER TABLE maladie DROP testeurs_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE maladie ADD testeurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maladie ADD CONSTRAINT FK_ADC4024B127F601C FOREIGN KEY (testeurs_id) REFERENCES testeur (id)');
        $this->addSql('CREATE INDEX IDX_ADC4024B127F601C ON maladie (testeurs_id)');
        $this->addSql('ALTER TABLE testeur DROP FOREIGN KEY FK_25028C13B4B1C397');
        $this->addSql('DROP INDEX IDX_25028C13B4B1C397 ON testeur');
        $this->addSql('ALTER TABLE testeur DROP maladie_id');
    }
}
