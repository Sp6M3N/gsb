<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201131945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_sheet (id INT AUTO_INCREMENT NOT NULL, user_fk_id INT NOT NULL, month_id INT NOT NULL, state_id INT NOT NULL, numbers_warrant VARCHAR(255) NOT NULL, validated_amounts VARCHAR(255) NOT NULL, modification_date DATETIME NOT NULL, INDEX IDX_243436D847B5E288 (user_fk_id), INDEX IDX_243436D8A0CBDE4 (month_id), INDEX IDX_243436D85D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_charges_outside_the_bundle (id INT AUTO_INCREMENT NOT NULL, user_fk_id INT NOT NULL, date DATETIME NOT NULL, amount VARCHAR(255) NOT NULL, wording VARCHAR(255) NOT NULL, INDEX IDX_C6C6FE447B5E288 (user_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_fees_package (id INT AUTO_INCREMENT NOT NULL, user_fk_id INT NOT NULL, month_id INT NOT NULL, package_fees_id INT NOT NULL, quantity VARCHAR(255) NOT NULL, INDEX IDX_95EF891A47B5E288 (user_fk_id), INDEX IDX_95EF891AA0CBDE4 (month_id), INDEX IDX_95EF891A1330B6A9 (package_fees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE month (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE package_fees (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, amount VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, hire_date VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense_sheet ADD CONSTRAINT FK_243436D847B5E288 FOREIGN KEY (user_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE expense_sheet ADD CONSTRAINT FK_243436D8A0CBDE4 FOREIGN KEY (month_id) REFERENCES month (id)');
        $this->addSql('ALTER TABLE expense_sheet ADD CONSTRAINT FK_243436D85D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle ADD CONSTRAINT FK_C6C6FE447B5E288 FOREIGN KEY (user_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE line_fees_package ADD CONSTRAINT FK_95EF891A47B5E288 FOREIGN KEY (user_fk_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE line_fees_package ADD CONSTRAINT FK_95EF891AA0CBDE4 FOREIGN KEY (month_id) REFERENCES month (id)');
        $this->addSql('ALTER TABLE line_fees_package ADD CONSTRAINT FK_95EF891A1330B6A9 FOREIGN KEY (package_fees_id) REFERENCES package_fees (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_sheet DROP FOREIGN KEY FK_243436D8A0CBDE4');
        $this->addSql('ALTER TABLE line_fees_package DROP FOREIGN KEY FK_95EF891AA0CBDE4');
        $this->addSql('ALTER TABLE line_fees_package DROP FOREIGN KEY FK_95EF891A1330B6A9');
        $this->addSql('ALTER TABLE expense_sheet DROP FOREIGN KEY FK_243436D85D83CC1');
        $this->addSql('ALTER TABLE expense_sheet DROP FOREIGN KEY FK_243436D847B5E288');
        $this->addSql('ALTER TABLE line_charges_outside_the_bundle DROP FOREIGN KEY FK_C6C6FE447B5E288');
        $this->addSql('ALTER TABLE line_fees_package DROP FOREIGN KEY FK_95EF891A47B5E288');
        $this->addSql('DROP TABLE expense_sheet');
        $this->addSql('DROP TABLE line_charges_outside_the_bundle');
        $this->addSql('DROP TABLE line_fees_package');
        $this->addSql('DROP TABLE month');
        $this->addSql('DROP TABLE package_fees');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE `user`');
    }
}
