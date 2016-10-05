<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161003191441 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE canal_virtual (id INT AUTO_INCREMENT NOT NULL, ensayo_id INT DEFAULT NULL, INDEX IDX_A8B8731625330D4C (ensayo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canalesVirtuales_sensores (canal_virtual_id INT NOT NULL, sensor_id INT NOT NULL, INDEX IDX_75F465F4BF420BD1 (canal_virtual_id), INDEX IDX_75F465F4A247991F (sensor_id), PRIMARY KEY(canal_virtual_id, sensor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sensor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE canal_virtual ADD CONSTRAINT FK_A8B8731625330D4C FOREIGN KEY (ensayo_id) REFERENCES ensayo (id)');
        $this->addSql('ALTER TABLE canalesVirtuales_sensores ADD CONSTRAINT FK_75F465F4BF420BD1 FOREIGN KEY (canal_virtual_id) REFERENCES canal_virtual (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE canalesVirtuales_sensores ADD CONSTRAINT FK_75F465F4A247991F FOREIGN KEY (sensor_id) REFERENCES sensor (id) ON DELETE CASCADE');

        for ($i=1 ; $i<=32 ; $i++) {
            $this->addSql("INSERT INTO sensor (id,nombre, descripcion) VALUES ('$i', 'Termocupla $i', '')");
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE canalesVirtuales_sensores DROP FOREIGN KEY FK_75F465F4BF420BD1');
        $this->addSql('ALTER TABLE canalesVirtuales_sensores DROP FOREIGN KEY FK_75F465F4A247991F');
        $this->addSql('DROP TABLE canal_virtual');
        $this->addSql('DROP TABLE canalesVirtuales_sensores');
        $this->addSql('DROP TABLE sensor');
    }
}
