<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205085341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE testeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testeur_test_clinique (testeur_id INT NOT NULL, test_clinique_id INT NOT NULL, INDEX IDX_3E418BD1196E57 (testeur_id), INDEX IDX_3E418BD792F381D (test_clinique_id), PRIMARY KEY(testeur_id, test_clinique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE testeur_test_clinique ADD CONSTRAINT FK_3E418BD1196E57 FOREIGN KEY (testeur_id) REFERENCES testeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE testeur_test_clinique ADD CONSTRAINT FK_3E418BD792F381D FOREIGN KEY (test_clinique_id) REFERENCES test_clinique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE testeur_test_clinique DROP FOREIGN KEY FK_3E418BD1196E57');
        $this->addSql('DROP TABLE testeur');
        $this->addSql('DROP TABLE testeur_test_clinique');
    }
}
