<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714162922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pizza_ingredient_pizza (pizza_id INT NOT NULL, ingredient_pizza_id INT NOT NULL, INDEX IDX_B95AF636D41D1D42 (pizza_id), UNIQUE INDEX UNIQ_B95AF636A61B4DCC (ingredient_pizza_id), PRIMARY KEY(pizza_id, ingredient_pizza_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizzeria_pizza (pizzeria_id INT NOT NULL, pizza_id INT NOT NULL, INDEX IDX_9F9B6E20F1965E46 (pizzeria_id), UNIQUE INDEX UNIQ_9F9B6E20D41D1D42 (pizza_id), PRIMARY KEY(pizzeria_id, pizza_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_ingredient_pizza ADD CONSTRAINT FK_B95AF636D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id_pizza)');
        $this->addSql('ALTER TABLE pizza_ingredient_pizza ADD CONSTRAINT FK_B95AF636A61B4DCC FOREIGN KEY (ingredient_pizza_id) REFERENCES nombre_ingredient_par_pizza (id_ingredient_pizza)');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id_pizzeria)');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id_pizza)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pizza_ingredient_pizza');
        $this->addSql('DROP TABLE pizzeria_pizza');
    }
}
