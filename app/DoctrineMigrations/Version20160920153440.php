<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160920153440 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ensayo ADD curva_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ensayo ADD CONSTRAINT FK_DC96E675AFF4B25C FOREIGN KEY (curva_id) REFERENCES curva (id)');
        $this->addSql('CREATE INDEX IDX_DC96E675AFF4B25C ON ensayo (curva_id)');
        $this->addSql('UPDATE (ensayo as a INNER JOIN curva as b) SET a.curva_id = b.id WHERE a.curva_id is NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ensayo DROP FOREIGN KEY FK_DC96E675AFF4B25C');
        $this->addSql('DROP INDEX IDX_DC96E675AFF4B25C ON ensayo');
        $this->addSql('ALTER TABLE ensayo DROP curva_id');
    }
}
