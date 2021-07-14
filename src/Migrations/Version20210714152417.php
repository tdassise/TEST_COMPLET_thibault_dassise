<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714152417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_ingredient_pizza ADD CONSTRAINT FK_B95AF636D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_ingredient_pizza ADD CONSTRAINT FK_B95AF636A61B4DCC FOREIGN KEY (ingredient_pizza_id) REFERENCES nombre_ingredient_par_pizza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_ingredient_pizza DROP FOREIGN KEY FK_B95AF636D41D1D42');
        $this->addSql('ALTER TABLE pizza_ingredient_pizza DROP FOREIGN KEY FK_B95AF636A61B4DCC');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20F1965E46');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20D41D1D42');
    }
}
