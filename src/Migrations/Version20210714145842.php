<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714145842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pizza_ingredient_pizza');
        $this->addSql('ALTER TABLE pizza DROP quantite_ingredients_id');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_ingredient_pizza (pizza_id INT NOT NULL, ingredient_pizza_id INT NOT NULL, INDEX IDX_B95AF636A61B4DCC (ingredient_pizza_id), INDEX IDX_B95AF636D41D1D42 (pizza_id), PRIMARY KEY(pizza_id, ingredient_pizza_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pizza ADD quantite_ingredients_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20F1965E46');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20D41D1D42');
    }
}
