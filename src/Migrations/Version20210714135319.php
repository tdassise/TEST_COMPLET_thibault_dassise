<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714135319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pizza_ingredient_pizza');
        $this->addSql('DROP TABLE pizzeria_pizza');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_ingredient_pizza (pizza_id INT NOT NULL, ingredient_pizza_id INT NOT NULL, INDEX IDX_B95AF636A61B4DCC (ingredient_pizza_id), INDEX IDX_B95AF636D41D1D42 (pizza_id), PRIMARY KEY(pizza_id, ingredient_pizza_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pizzeria_pizza (pizzeria_id INT NOT NULL, pizza_id INT NOT NULL, INDEX IDX_9F9B6E20D41D1D42 (pizza_id), INDEX IDX_9F9B6E20F1965E46 (pizzeria_id), PRIMARY KEY(pizzeria_id, pizza_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
