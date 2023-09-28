<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230925184201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id_adm INT AUTO_INCREMENT NOT NULL, pseudo_adm VARCHAR(255) NOT NULL, mdp_adm VARCHAR(64) NOT NULL, mail_adm VARCHAR(255) NOT NULL, phone_adm VARCHAR(20) NOT NULL, PRIMARY KEY(id_adm)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, text_com VARCHAR(1024) NOT NULL, nb_like_com INT NOT NULL, UNIQUE INDEX UNIQ_67F068BC50EAE44 (id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creer (id INT AUTO_INCREMENT NOT NULL, date_cre DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id_lik INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, UNIQUE INDEX UNIQ_AC6340B350EAE44 (id_utilisateur), PRIMARY KEY(id_lik)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderer (id_mod INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, id_adm INT NOT NULL, date_mod DATE NOT NULL, etatutilisateur_mod VARCHAR(255) NOT NULL, INDEX IDX_1F11AAA450EAE44 (id_utilisateur), INDEX IDX_1F11AAA41A622319 (id_adm), PRIMARY KEY(id_mod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modifier (id INT AUTO_INCREMENT NOT NULL, id_pub INT NOT NULL, date_mdf DATE NOT NULL, demande_mdf VARCHAR(255) NOT NULL, id_Utilisateur INT NOT NULL, INDEX IDX_ABBFD9FD83922193 (id_Utilisateur), INDEX IDX_ABBFD9FDC4E0D4DF (id_pub), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id_pub INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, id_tp INT NOT NULL, image_pub VARCHAR(255) DEFAULT NULL, text_pub VARCHAR(10000) NOT NULL, INDEX IDX_AF3C677950EAE44 (id_utilisateur), INDEX IDX_AF3C67799AF22636 (id_tp), PRIMARY KEY(id_pub)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_publication (id_tp INT AUTO_INCREMENT NOT NULL, type_tp VARCHAR(255) NOT NULL, PRIMARY KEY(id_tp)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id_use INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3F85E0677 (username), PRIMARY KEY(id_use)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_use)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B350EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_use)');
        $this->addSql('ALTER TABLE moderer ADD CONSTRAINT FK_1F11AAA450EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_use)');
        $this->addSql('ALTER TABLE moderer ADD CONSTRAINT FK_1F11AAA41A622319 FOREIGN KEY (id_adm) REFERENCES `admin` (id_adm)');
        $this->addSql('ALTER TABLE modifier ADD CONSTRAINT FK_ABBFD9FD83922193 FOREIGN KEY (id_Utilisateur) REFERENCES utilisateur (id_use)');
        $this->addSql('ALTER TABLE modifier ADD CONSTRAINT FK_ABBFD9FDC4E0D4DF FOREIGN KEY (id_pub) REFERENCES publication (id_pub)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677950EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_use)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67799AF22636 FOREIGN KEY (id_tp) REFERENCES type_publication (id_tp)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC50EAE44');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B350EAE44');
        $this->addSql('ALTER TABLE moderer DROP FOREIGN KEY FK_1F11AAA450EAE44');
        $this->addSql('ALTER TABLE moderer DROP FOREIGN KEY FK_1F11AAA41A622319');
        $this->addSql('ALTER TABLE modifier DROP FOREIGN KEY FK_ABBFD9FD83922193');
        $this->addSql('ALTER TABLE modifier DROP FOREIGN KEY FK_ABBFD9FDC4E0D4DF');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677950EAE44');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67799AF22636');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE creer');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE moderer');
        $this->addSql('DROP TABLE modifier');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE type_publication');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
