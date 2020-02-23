<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200223143122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parent_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_64C19C1727ACA70 ON category (parent_id)');
        $this->addSql('CREATE TABLE category_project (category_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(category_id, project_id))');
        $this->addSql('CREATE INDEX IDX_E86B909012469DE2 ON category_project (category_id)');
        $this->addSql('CREATE INDEX IDX_E86B9090166D1F9C ON category_project (project_id)');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, message VARCHAR(1500) NOT NULL, date_tile DATETIME NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C166D1F9C ON comment (project_id)');
        $this->addSql('CREATE TABLE donation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, amount DOUBLE PRECISION NOT NULL, date_time DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_31E581A0A76ED395 ON donation (user_id)');
        $this->addSql('CREATE INDEX IDX_31E581A0166D1F9C ON donation (project_id)');
        $this->addSql('CREATE TABLE project (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, statu_id INTEGER NOT NULL, objectif DOUBLE PRECISION NOT NULL, limit_date DATE NOT NULL, report INTEGER NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL, description VARCHAR(255) DEFAULT NULL, minature VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA76ED395 ON project (user_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE55C16B5E ON project (statu_id)');
        $this->addSql('CREATE TABLE status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE subscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_A3C664D3A76ED395 ON subscription (user_id)');
        $this->addSql('CREATE INDEX IDX_A3C664D3166D1F9C ON subscription (project_id)');
        $this->addSql('CREATE TABLE tag (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE tag_project (tag_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(tag_id, project_id))');
        $this->addSql('CREATE INDEX IDX_1D82FD44BAD26311 ON tag_project (tag_id)');
        $this->addSql('CREATE INDEX IDX_1D82FD44166D1F9C ON tag_project (project_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, child_id INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, facebook_id INTEGER DEFAULT NULL, google_id INTEGER DEFAULT NULL, apple_id INTEGER DEFAULT NULL, instagram_id INTEGER DEFAULT NULL, linkedin_id INTEGER NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE INDEX IDX_8D93D649DD62C21B ON user (child_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_project');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE donation');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_project');
        $this->addSql('DROP TABLE user');
    }
}
