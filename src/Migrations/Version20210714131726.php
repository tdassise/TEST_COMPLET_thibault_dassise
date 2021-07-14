<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714131726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza ADD quantite_ingredients_id INT NOT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F57A2D7DE FOREIGN KEY (quantite_ingredients_id) REFERENCES nombre_ingredient_par_pizza (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F57A2D7DE ON pizza (quantite_ingredients_id)');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria_pizza ADD CONSTRAINT FK_9F9B6E20D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F57A2D7DE');
        $this->addSql('DROP INDEX IDX_CFDD826F57A2D7DE ON pizza');
        $this->addSql('ALTER TABLE pizza DROP quantite_ingredients_id');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20F1965E46');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP FOREIGN KEY FK_9F9B6E20D41D1D42');
    }
}
