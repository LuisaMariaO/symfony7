<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625201240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cliente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cuenta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departamento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE municipio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_id_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transaccion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cliente (id INT NOT NULL, id_tipo INT NOT NULL, nombres VARCHAR(100) NOT NULL, apellidos VARCHAR(100) NOT NULL, razon_social VARCHAR(100) DEFAULT NULL, id_municipio INT NOT NULL, id_departamento INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cuenta (id INT NOT NULL, saldo DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE departamento (id INT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE municipio (id INT NOT NULL, id_departamento INT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tipo_id (id INT NOT NULL, tipo VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transaccion (id INT NOT NULL, tipo VARCHAR(10) NOT NULL, id_cliente INT NOT NULL, monto DOUBLE PRECISION NOT NULL, timestamp TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cliente_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cuenta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departamento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE municipio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_id_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transaccion_id_seq CASCADE');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE cuenta');
        $this->addSql('DROP TABLE departamento');
        $this->addSql('DROP TABLE municipio');
        $this->addSql('DROP TABLE tipo_id');
        $this->addSql('DROP TABLE transaccion');
    }
}
