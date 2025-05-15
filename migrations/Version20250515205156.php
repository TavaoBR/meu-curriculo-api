<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515205156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE certificacoes (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, instituicao VARCHAR(255) DEFAULT NULL, data DATE DEFAULT NULL, descricao LONGTEXT DEFAULT NULL, arquivo_pdf LONGTEXT DEFAULT NULL, INDEX IDX_3C96FAB2EDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE curriculos (id INT AUTO_INCREMENT NOT NULL, usuario_id_id INT DEFAULT NULL, nome_completo VARCHAR(255) DEFAULT NULL, area_atuacao VARCHAR(255) DEFAULT NULL, estado VARCHAR(255) DEFAULT NULL, cidade VARCHAR(255) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, data_nascimento DATE DEFAULT NULL, telefone VARCHAR(20) DEFAULT NULL, genero VARCHAR(20) DEFAULT NULL, estado_civil VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_31C0607B629AF449 (usuario_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE experiencias (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, cargo VARCHAR(255) DEFAULT NULL, empresa VARCHAR(255) DEFAULT NULL, inicio DATE DEFAULT NULL, fim DATE DEFAULT NULL, atual TINYINT(1) DEFAULT NULL, descricao LONGTEXT DEFAULT NULL, INDEX IDX_3A67358EEDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE formacoes_academicas (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, curso VARCHAR(255) DEFAULT NULL, instituicao VARCHAR(255) DEFAULT NULL, inicio DATE DEFAULT NULL, fim DATE DEFAULT NULL, nivel VARCHAR(255) DEFAULT NULL, INDEX IDX_2CD66AE1EDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE habilidades (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, nivel VARCHAR(255) DEFAULT NULL, INDEX IDX_10195E1DEDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE idiomas (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, idioma VARCHAR(100) DEFAULT NULL, nivel VARCHAR(255) DEFAULT NULL, INDEX IDX_12A54B7EEDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE links (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, url LONGTEXT DEFAULT NULL, INDEX IDX_D182A118EDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE projetos (id INT AUTO_INCREMENT NOT NULL, curriculo_id_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, descricao LONGTEXT DEFAULT NULL, link LONGTEXT DEFAULT NULL, INDEX IDX_ECCCCDCBEDFCEC35 (curriculo_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE resumos (id INT AUTO_INCREMENT NOT NULL, curricul_id_id INT DEFAULT NULL, texto LONGTEXT DEFAULT NULL, INDEX IDX_375745B94CE7102D (curricul_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, senha VARCHAR(255) DEFAULT NULL, tentativas INT DEFAULT NULL, token VARCHAR(999) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE certificacoes ADD CONSTRAINT FK_3C96FAB2EDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculos ADD CONSTRAINT FK_31C0607B629AF449 FOREIGN KEY (usuario_id_id) REFERENCES usuarios (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE experiencias ADD CONSTRAINT FK_3A67358EEDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formacoes_academicas ADD CONSTRAINT FK_2CD66AE1EDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE habilidades ADD CONSTRAINT FK_10195E1DEDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE idiomas ADD CONSTRAINT FK_12A54B7EEDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE links ADD CONSTRAINT FK_D182A118EDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projetos ADD CONSTRAINT FK_ECCCCDCBEDFCEC35 FOREIGN KEY (curriculo_id_id) REFERENCES curriculos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE resumos ADD CONSTRAINT FK_375745B94CE7102D FOREIGN KEY (curricul_id_id) REFERENCES curriculos (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE certificacoes DROP FOREIGN KEY FK_3C96FAB2EDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculos DROP FOREIGN KEY FK_31C0607B629AF449
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE experiencias DROP FOREIGN KEY FK_3A67358EEDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formacoes_academicas DROP FOREIGN KEY FK_2CD66AE1EDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE habilidades DROP FOREIGN KEY FK_10195E1DEDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE idiomas DROP FOREIGN KEY FK_12A54B7EEDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE links DROP FOREIGN KEY FK_D182A118EDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projetos DROP FOREIGN KEY FK_ECCCCDCBEDFCEC35
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE resumos DROP FOREIGN KEY FK_375745B94CE7102D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE certificacoes
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE curriculos
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE experiencias
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE formacoes_academicas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE habilidades
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE idiomas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE links
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE projetos
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE resumos
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE usuarios
        SQL);
    }
}
