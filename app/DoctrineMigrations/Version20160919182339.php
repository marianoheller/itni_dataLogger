<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160919182339 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        //$this->addSql('CREATE TABLE curva (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, formula VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE ensayo DROP curva');

        $formulaSinFormula = null;
        $formulaFuegoExt = "600*(1-0.687*exp(-0.32*t)-0.313*exp(-3.8*t))+20";
        $formulaHidrocarb = "1080*(1-0.325*exp(-0.167*t)-0.675*exp(-2.5*t))+20";
        $formulaCalentamientoLento_A = "154*pow(t,0.25)+20";
        $formulaCalentamientoLento_B = "345*(log(8*(t-20)+1)/log(10))+20";

        $this->addSql("INSERT INTO curva (`nombre`)
                        VALUES ('Sin Curva')");
        $this->addSql("INSERT INTO curva (`nombre`, `formula`)
                        VALUES ('Fuego Exterior', '$formulaFuegoExt')");
        $this->addSql("INSERT INTO curva (`nombre`, `formula`)
                        VALUES ('Hidrocarburos', '$formulaHidrocarb')");
        /*$this->addSql("INSERT INTO curva (`nombre`, `formula`)
                        VALUES ('cal_lento_A', '$formulaCalentamientoLento_A')");
        $this->addSql("INSERT INTO curva (`nombre`, `formula`)
                        VALUES ('cal_lento_B', '$formulaCalentamientoLento_B')");*/
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        //$this->addSql('DROP TABLE curva');
        //$this->addSql('ALTER TABLE ensayo ADD curva VARCHAR(255) DEFAULT \'"sin_curva"\' NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
