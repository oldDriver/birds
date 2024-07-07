<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240707201509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE battery_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE battery_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bird_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE make_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE military_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE model_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE place_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE position_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rank_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE team_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE battery (id INT NOT NULL, type_id INT DEFAULT NULL, bird_id INT DEFAULT NULL, place_id INT DEFAULT NULL, serial_number VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D02EF4AEC54C8C93 ON battery (type_id)');
        $this->addSql('CREATE INDEX IDX_D02EF4AEE813F9 ON battery (bird_id)');
        $this->addSql('CREATE INDEX IDX_D02EF4AEDA6A219 ON battery (place_id)');
        $this->addSql('COMMENT ON COLUMN battery.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN battery.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE battery_type (id INT NOT NULL, name VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN battery_type.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN battery_type.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE bird (id INT NOT NULL, make_id INT NOT NULL, model_id INT NOT NULL, status_id INT NOT NULL, team_id INT NOT NULL, place_id INT DEFAULT NULL, serial_number VARCHAR(255) NOT NULL, tail_number VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A0BBAE0ECFBF73EB ON bird (make_id)');
        $this->addSql('CREATE INDEX IDX_A0BBAE0E7975B7E7 ON bird (model_id)');
        $this->addSql('CREATE INDEX IDX_A0BBAE0E6BF700BD ON bird (status_id)');
        $this->addSql('CREATE INDEX IDX_A0BBAE0E296CD8AE ON bird (team_id)');
        $this->addSql('CREATE INDEX IDX_A0BBAE0EDA6A219 ON bird (place_id)');
        $this->addSql('COMMENT ON COLUMN bird.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN bird.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE make (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN make.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN make.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE military (id INT NOT NULL, rank_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_426EFD187616678F ON military (rank_id)');
        $this->addSql('COMMENT ON COLUMN military.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN military.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE model (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN model.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN model.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE place (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN place.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN place.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE position (id INT NOT NULL, name VARCHAR(150) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN position.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN position.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE rank (id INT NOT NULL, name VARCHAR(50) NOT NULL, ranking SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN rank.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN rank.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE status (id INT NOT NULL, name VARCHAR(255) NOT NULL, is_active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN status.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN status.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE team (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN team.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN team.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE battery ADD CONSTRAINT FK_D02EF4AEC54C8C93 FOREIGN KEY (type_id) REFERENCES battery_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE battery ADD CONSTRAINT FK_D02EF4AEE813F9 FOREIGN KEY (bird_id) REFERENCES bird (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE battery ADD CONSTRAINT FK_D02EF4AEDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bird ADD CONSTRAINT FK_A0BBAE0ECFBF73EB FOREIGN KEY (make_id) REFERENCES make (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bird ADD CONSTRAINT FK_A0BBAE0E7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bird ADD CONSTRAINT FK_A0BBAE0E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bird ADD CONSTRAINT FK_A0BBAE0E296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bird ADD CONSTRAINT FK_A0BBAE0EDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE military ADD CONSTRAINT FK_426EFD187616678F FOREIGN KEY (rank_id) REFERENCES rank (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE battery_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE battery_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bird_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE make_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE military_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE model_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE place_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE position_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rank_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE team_id_seq CASCADE');
        $this->addSql('ALTER TABLE battery DROP CONSTRAINT FK_D02EF4AEC54C8C93');
        $this->addSql('ALTER TABLE battery DROP CONSTRAINT FK_D02EF4AEE813F9');
        $this->addSql('ALTER TABLE battery DROP CONSTRAINT FK_D02EF4AEDA6A219');
        $this->addSql('ALTER TABLE bird DROP CONSTRAINT FK_A0BBAE0ECFBF73EB');
        $this->addSql('ALTER TABLE bird DROP CONSTRAINT FK_A0BBAE0E7975B7E7');
        $this->addSql('ALTER TABLE bird DROP CONSTRAINT FK_A0BBAE0E6BF700BD');
        $this->addSql('ALTER TABLE bird DROP CONSTRAINT FK_A0BBAE0E296CD8AE');
        $this->addSql('ALTER TABLE bird DROP CONSTRAINT FK_A0BBAE0EDA6A219');
        $this->addSql('ALTER TABLE military DROP CONSTRAINT FK_426EFD187616678F');
        $this->addSql('DROP TABLE battery');
        $this->addSql('DROP TABLE battery_type');
        $this->addSql('DROP TABLE bird');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE military');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE team');
        $this->addSql('ALTER TABLE "user" DROP created_at');
        $this->addSql('ALTER TABLE "user" DROP updated_at');
    }
}
