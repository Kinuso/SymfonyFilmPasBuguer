<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240419075028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE films_categorie (films_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_3783C771939610EE (films_id), INDEX IDX_3783C771BCF5E72D (categorie_id), PRIMARY KEY(films_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films_categorie ADD CONSTRAINT FK_3783C771939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_categorie ADD CONSTRAINT FK_3783C771BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films ADD classification_id INT NOT NULL');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA512A86559F FOREIGN KEY (classification_id) REFERENCES classification (id)');
        $this->addSql('CREATE INDEX IDX_CEECCA512A86559F ON films (classification_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films_categorie DROP FOREIGN KEY FK_3783C771939610EE');
        $this->addSql('ALTER TABLE films_categorie DROP FOREIGN KEY FK_3783C771BCF5E72D');
        $this->addSql('DROP TABLE films_categorie');
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA512A86559F');
        $this->addSql('DROP INDEX IDX_CEECCA512A86559F ON films');
        $this->addSql('ALTER TABLE films DROP classification_id');
    }
}
