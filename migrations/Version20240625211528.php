<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625211528 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente ALTER id TYPE int');
        $this->addSql('ALTER TABLE cuenta ALTER cliente_id TYPE int');
        $this->addSql('ALTER TABLE transaccion ALTER cliente_id TYPE int');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cuenta ALTER cliente_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE transaccion ALTER cliente_id TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE cliente ALTER id TYPE VARCHAR(255)');
    }
}
