<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314124640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_64C19C1727ACA70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__category AS SELECT id, parent_id, name FROM category');
        $this->addSql('DROP TABLE category');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parent_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO category (id, parent_id, name) SELECT id, parent_id, name FROM __temp__category');
        $this->addSql('DROP TABLE __temp__category');
        $this->addSql('CREATE INDEX IDX_64C19C1727ACA70 ON category (parent_id)');
        $this->addSql('DROP INDEX IDX_E86B9090166D1F9C');
        $this->addSql('DROP INDEX IDX_E86B909012469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__category_project AS SELECT category_id, project_id FROM category_project');
        $this->addSql('DROP TABLE category_project');
        $this->addSql('CREATE TABLE category_project (category_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(category_id, project_id), CONSTRAINT FK_E86B909012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E86B9090166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO category_project (category_id, project_id) SELECT category_id, project_id FROM __temp__category_project');
        $this->addSql('DROP TABLE __temp__category_project');
        $this->addSql('CREATE INDEX IDX_E86B9090166D1F9C ON category_project (project_id)');
        $this->addSql('CREATE INDEX IDX_E86B909012469DE2 ON category_project (category_id)');
        $this->addSql('DROP INDEX IDX_9474526C166D1F9C');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, user_id, project_id, message, date_tile, up, down FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, message VARCHAR(1500) NOT NULL COLLATE BINARY, date_tile DATETIME NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL, CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9474526C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO comment (id, user_id, project_id, message, date_tile, up, down) SELECT id, user_id, project_id, message, date_tile, up, down FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526C166D1F9C ON comment (project_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('DROP INDEX IDX_31E581A0166D1F9C');
        $this->addSql('DROP INDEX IDX_31E581A0A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__donation AS SELECT id, user_id, project_id, amount, date_time FROM donation');
        $this->addSql('DROP TABLE donation');
        $this->addSql('CREATE TABLE donation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, amount DOUBLE PRECISION NOT NULL, date_time DATETIME NOT NULL, CONSTRAINT FK_31E581A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_31E581A0166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO donation (id, user_id, project_id, amount, date_time) SELECT id, user_id, project_id, amount, date_time FROM __temp__donation');
        $this->addSql('DROP TABLE __temp__donation');
        $this->addSql('CREATE INDEX IDX_31E581A0166D1F9C ON donation (project_id)');
        $this->addSql('CREATE INDEX IDX_31E581A0A76ED395 ON donation (user_id)');
        $this->addSql('DROP INDEX IDX_2FB3D0EE55C16B5E');
        $this->addSql('DROP INDEX IDX_2FB3D0EEA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__project AS SELECT id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature FROM project');
        $this->addSql('DROP TABLE project');
        $this->addSql('CREATE TABLE project (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, statu_id INTEGER NOT NULL, objectif DOUBLE PRECISION NOT NULL, limit_date DATE NOT NULL, report INTEGER NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL, description VARCHAR(255) DEFAULT NULL COLLATE BINARY, minature VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2FB3D0EE55C16B5E FOREIGN KEY (statu_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO project (id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature) SELECT id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature FROM __temp__project');
        $this->addSql('DROP TABLE __temp__project');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE55C16B5E ON project (statu_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA76ED395 ON project (user_id)');
        $this->addSql('DROP INDEX IDX_A3C664D3166D1F9C');
        $this->addSql('DROP INDEX IDX_A3C664D3A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subscription AS SELECT id, user_id, project_id FROM subscription');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('CREATE TABLE subscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, CONSTRAINT FK_A3C664D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A3C664D3166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subscription (id, user_id, project_id) SELECT id, user_id, project_id FROM __temp__subscription');
        $this->addSql('DROP TABLE __temp__subscription');
        $this->addSql('CREATE INDEX IDX_A3C664D3166D1F9C ON subscription (project_id)');
        $this->addSql('CREATE INDEX IDX_A3C664D3A76ED395 ON subscription (user_id)');
        $this->addSql('DROP INDEX IDX_1D82FD44166D1F9C');
        $this->addSql('DROP INDEX IDX_1D82FD44BAD26311');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tag_project AS SELECT tag_id, project_id FROM tag_project');
        $this->addSql('DROP TABLE tag_project');
        $this->addSql('CREATE TABLE tag_project (tag_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(tag_id, project_id), CONSTRAINT FK_1D82FD44BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1D82FD44166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO tag_project (tag_id, project_id) SELECT tag_id, project_id FROM __temp__tag_project');
        $this->addSql('DROP TABLE __temp__tag_project');
        $this->addSql('CREATE INDEX IDX_1D82FD44166D1F9C ON tag_project (project_id)');
        $this->addSql('CREATE INDEX IDX_1D82FD44BAD26311 ON tag_project (tag_id)');
        $this->addSql('DROP INDEX IDX_8D93D649DD62C21B');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, child_id INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL COLLATE BINARY, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:json)
        , password VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) DEFAULT NULL COLLATE BINARY, facebook_id INTEGER DEFAULT NULL, google_id INTEGER DEFAULT NULL, apple_id INTEGER DEFAULT NULL, instagram_id INTEGER DEFAULT NULL, linkedin_id INTEGER DEFAULT NULL, CONSTRAINT FK_8D93D649DD62C21B FOREIGN KEY (child_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user (id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id) SELECT id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE INDEX IDX_8D93D649DD62C21B ON user (child_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_64C19C1727ACA70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__category AS SELECT id, parent_id, name FROM category');
        $this->addSql('DROP TABLE category');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parent_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO category (id, parent_id, name) SELECT id, parent_id, name FROM __temp__category');
        $this->addSql('DROP TABLE __temp__category');
        $this->addSql('CREATE INDEX IDX_64C19C1727ACA70 ON category (parent_id)');
        $this->addSql('DROP INDEX IDX_E86B909012469DE2');
        $this->addSql('DROP INDEX IDX_E86B9090166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__category_project AS SELECT category_id, project_id FROM category_project');
        $this->addSql('DROP TABLE category_project');
        $this->addSql('CREATE TABLE category_project (category_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(category_id, project_id))');
        $this->addSql('INSERT INTO category_project (category_id, project_id) SELECT category_id, project_id FROM __temp__category_project');
        $this->addSql('DROP TABLE __temp__category_project');
        $this->addSql('CREATE INDEX IDX_E86B909012469DE2 ON category_project (category_id)');
        $this->addSql('CREATE INDEX IDX_E86B9090166D1F9C ON category_project (project_id)');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526C166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, user_id, project_id, message, date_tile, up, down FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, message VARCHAR(1500) NOT NULL, date_tile DATETIME NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL)');
        $this->addSql('INSERT INTO comment (id, user_id, project_id, message, date_tile, up, down) SELECT id, user_id, project_id, message, date_tile, up, down FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C166D1F9C ON comment (project_id)');
        $this->addSql('DROP INDEX IDX_31E581A0A76ED395');
        $this->addSql('DROP INDEX IDX_31E581A0166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__donation AS SELECT id, user_id, project_id, amount, date_time FROM donation');
        $this->addSql('DROP TABLE donation');
        $this->addSql('CREATE TABLE donation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL, amount DOUBLE PRECISION NOT NULL, date_time DATETIME NOT NULL)');
        $this->addSql('INSERT INTO donation (id, user_id, project_id, amount, date_time) SELECT id, user_id, project_id, amount, date_time FROM __temp__donation');
        $this->addSql('DROP TABLE __temp__donation');
        $this->addSql('CREATE INDEX IDX_31E581A0A76ED395 ON donation (user_id)');
        $this->addSql('CREATE INDEX IDX_31E581A0166D1F9C ON donation (project_id)');
        $this->addSql('DROP INDEX IDX_2FB3D0EEA76ED395');
        $this->addSql('DROP INDEX IDX_2FB3D0EE55C16B5E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__project AS SELECT id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature FROM project');
        $this->addSql('DROP TABLE project');
        $this->addSql('CREATE TABLE project (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, statu_id INTEGER NOT NULL, objectif DOUBLE PRECISION NOT NULL, limit_date DATE NOT NULL, report INTEGER NOT NULL, up INTEGER NOT NULL, down INTEGER NOT NULL, description VARCHAR(255) DEFAULT NULL, minature VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO project (id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature) SELECT id, user_id, statu_id, objectif, limit_date, report, up, down, description, minature FROM __temp__project');
        $this->addSql('DROP TABLE __temp__project');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEA76ED395 ON project (user_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE55C16B5E ON project (statu_id)');
        $this->addSql('DROP INDEX IDX_A3C664D3A76ED395');
        $this->addSql('DROP INDEX IDX_A3C664D3166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subscription AS SELECT id, user_id, project_id FROM subscription');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('CREATE TABLE subscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, project_id INTEGER NOT NULL)');
        $this->addSql('INSERT INTO subscription (id, user_id, project_id) SELECT id, user_id, project_id FROM __temp__subscription');
        $this->addSql('DROP TABLE __temp__subscription');
        $this->addSql('CREATE INDEX IDX_A3C664D3A76ED395 ON subscription (user_id)');
        $this->addSql('CREATE INDEX IDX_A3C664D3166D1F9C ON subscription (project_id)');
        $this->addSql('DROP INDEX IDX_1D82FD44BAD26311');
        $this->addSql('DROP INDEX IDX_1D82FD44166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tag_project AS SELECT tag_id, project_id FROM tag_project');
        $this->addSql('DROP TABLE tag_project');
        $this->addSql('CREATE TABLE tag_project (tag_id INTEGER NOT NULL, project_id INTEGER NOT NULL, PRIMARY KEY(tag_id, project_id))');
        $this->addSql('INSERT INTO tag_project (tag_id, project_id) SELECT tag_id, project_id FROM __temp__tag_project');
        $this->addSql('DROP TABLE __temp__tag_project');
        $this->addSql('CREATE INDEX IDX_1D82FD44BAD26311 ON tag_project (tag_id)');
        $this->addSql('CREATE INDEX IDX_1D82FD44166D1F9C ON tag_project (project_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677');
        $this->addSql('DROP INDEX IDX_8D93D649DD62C21B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, child_id INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, facebook_id INTEGER DEFAULT NULL, google_id INTEGER DEFAULT NULL, apple_id INTEGER DEFAULT NULL, instagram_id INTEGER DEFAULT NULL, linkedin_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id) SELECT id, child_id, username, roles, password, email, facebook_id, google_id, apple_id, instagram_id, linkedin_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE INDEX IDX_8D93D649DD62C21B ON user (child_id)');
    }
}
