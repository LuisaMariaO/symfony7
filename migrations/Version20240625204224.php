<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625204224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente ADD municipio_id INT NOT NULL');
        $this->addSql('ALTER TABLE cliente ADD departamento_id INT NOT NULL');
        $this->addSql('ALTER TABLE cliente RENAME COLUMN id_tipo TO tipo_id_id');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B2579F8049F FOREIGN KEY (tipo_id_id) REFERENCES tipo_id (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B2558BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B255A91C08D FOREIGN KEY (departamento_id) REFERENCES departamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F41C9B2579F8049F ON cliente (tipo_id_id)');
        $this->addSql('CREATE INDEX IDX_F41C9B2558BC1BE0 ON cliente (municipio_id)');
        $this->addSql('CREATE INDEX IDX_F41C9B255A91C08D ON cliente (departamento_id)');
        $this->addSql('ALTER TABLE cuenta ADD cliente_id INT NOT NULL');
        $this->addSql('ALTER TABLE cuenta ADD CONSTRAINT FK_31C7BFCFDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_31C7BFCFDE734E51 ON cuenta (cliente_id)');
        $this->addSql('ALTER TABLE municipio ADD departamento_id INT NOT NULL');
        $this->addSql('ALTER TABLE municipio ADD CONSTRAINT FK_FE98F5E05A91C08D FOREIGN KEY (departamento_id) REFERENCES departamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FE98F5E05A91C08D ON municipio (departamento_id)');
        $this->addSql('ALTER TABLE transaccion ADD cliente_id INT NOT NULL');
        $this->addSql('ALTER TABLE transaccion ADD CONSTRAINT FK_BFF96AF7DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BFF96AF7DE734E51 ON transaccion (cliente_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE municipio DROP CONSTRAINT FK_FE98F5E05A91C08D');
        $this->addSql('DROP INDEX IDX_FE98F5E05A91C08D');
        $this->addSql('ALTER TABLE municipio DROP departamento_id');
        $this->addSql('ALTER TABLE cuenta DROP CONSTRAINT FK_31C7BFCFDE734E51');
        $this->addSql('DROP INDEX IDX_31C7BFCFDE734E51');
        $this->addSql('ALTER TABLE cuenta DROP cliente_id');
        $this->addSql('ALTER TABLE transaccion DROP CONSTRAINT FK_BFF96AF7DE734E51');
        $this->addSql('DROP INDEX IDX_BFF96AF7DE734E51');
        $this->addSql('ALTER TABLE transaccion DROP cliente_id');
        $this->addSql('ALTER TABLE cliente DROP CONSTRAINT FK_F41C9B2579F8049F');
        $this->addSql('ALTER TABLE cliente DROP CONSTRAINT FK_F41C9B2558BC1BE0');
        $this->addSql('ALTER TABLE cliente DROP CONSTRAINT FK_F41C9B255A91C08D');
        $this->addSql('DROP INDEX IDX_F41C9B2579F8049F');
        $this->addSql('DROP INDEX IDX_F41C9B2558BC1BE0');
        $this->addSql('DROP INDEX IDX_F41C9B255A91C08D');
        $this->addSql('ALTER TABLE cliente ADD id_tipo INT NOT NULL');
        $this->addSql('ALTER TABLE cliente DROP tipo_id_id');
        $this->addSql('ALTER TABLE cliente DROP municipio_id');
        $this->addSql('ALTER TABLE cliente DROP departamento_id');
    }
}
