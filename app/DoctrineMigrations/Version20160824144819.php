<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160824144819 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(30) NOT NULL');
        $this->addSql("INSERT INTO user (`username`, `password`, `is_active`, `is_device`, `is_admin`)
                        VALUES ('admin', '$2a$08\$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 1, 0, 1)");
        $this->addSql("INSERT INTO user (`username`, `password`, `is_active`, `is_device`, `is_admin`)
                        VALUES ('user', '$2y$13$0t5OoLj5ra7yODOpuMNUueUohLL.aaWZZteZAfl6hAlq3HOU3c2Ce', 1, 0, 0)");
        $this->addSql("INSERT INTO user (`username`, `password`, `is_active`, `is_device`, `is_admin`)
                        VALUES ('device', '$2y$13\$DKY90swC5yMPNM9f7HU6Y.b0z47ND4/N4eqLrgKBv3IJfVNqpbe.y', 1, 1, 0)");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
