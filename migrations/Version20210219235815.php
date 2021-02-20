<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219235815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE email_template (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, deleted_by VARCHAR(255) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locale_templates (id INT AUTO_INCREMENT NOT NULL, quote_email_id INT NOT NULL, no_quote_email_id INT NOT NULL, header_image_id INT DEFAULT NULL, footer_image_id INT DEFAULT NULL, brochure_id INT DEFAULT NULL, locale VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, workflow VARCHAR(255) NOT NULL, document_style VARCHAR(255) NOT NULL, contact_email VARCHAR(255) DEFAULT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, deleted_by VARCHAR(255) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8A52955B42086958 (quote_email_id), UNIQUE INDEX UNIQ_8A52955B52783A8 (no_quote_email_id), UNIQUE INDEX UNIQ_8A52955B8C782417 (header_image_id), UNIQUE INDEX UNIQ_8A52955B45C207B5 (footer_image_id), UNIQUE INDEX UNIQ_8A52955BB96114D1 (brochure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE various_file (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, file_size INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locale_templates ADD CONSTRAINT FK_8A52955B42086958 FOREIGN KEY (quote_email_id) REFERENCES email_template (id)');
        $this->addSql('ALTER TABLE locale_templates ADD CONSTRAINT FK_8A52955B52783A8 FOREIGN KEY (no_quote_email_id) REFERENCES email_template (id)');
        $this->addSql('ALTER TABLE locale_templates ADD CONSTRAINT FK_8A52955B8C782417 FOREIGN KEY (header_image_id) REFERENCES various_file (id)');
        $this->addSql('ALTER TABLE locale_templates ADD CONSTRAINT FK_8A52955B45C207B5 FOREIGN KEY (footer_image_id) REFERENCES various_file (id)');
        $this->addSql('ALTER TABLE locale_templates ADD CONSTRAINT FK_8A52955BB96114D1 FOREIGN KEY (brochure_id) REFERENCES various_file (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locale_templates DROP FOREIGN KEY FK_8A52955B42086958');
        $this->addSql('ALTER TABLE locale_templates DROP FOREIGN KEY FK_8A52955B52783A8');
        $this->addSql('ALTER TABLE locale_templates DROP FOREIGN KEY FK_8A52955B8C782417');
        $this->addSql('ALTER TABLE locale_templates DROP FOREIGN KEY FK_8A52955B45C207B5');
        $this->addSql('ALTER TABLE locale_templates DROP FOREIGN KEY FK_8A52955BB96114D1');
        $this->addSql('DROP TABLE email_template');
        $this->addSql('DROP TABLE locale_templates');
        $this->addSql('DROP TABLE various_file');
    }
}
