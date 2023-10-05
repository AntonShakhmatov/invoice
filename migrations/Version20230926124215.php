<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926124215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(12, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY invoice_ibfk_1');
        $this->addSql('DROP INDEX id ON invoice');
        $this->addSql('ALTER TABLE invoice_lines DROP FOREIGN KEY invoice_lines_ibfk_1');
        $this->addSql('DROP INDEX invoice_id ON invoice_lines');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT invoice_ibfk_1 FOREIGN KEY (id) REFERENCES invoice (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX id ON invoice (id)');
        $this->addSql('ALTER TABLE invoice_lines ADD CONSTRAINT invoice_lines_ibfk_1 FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX invoice_id ON invoice_lines (invoice_id)');
    }
}
