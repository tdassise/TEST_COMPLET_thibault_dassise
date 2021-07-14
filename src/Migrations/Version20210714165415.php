<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714165415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_ingredient_pizza DROP INDEX UNIQ_B95AF636A61B4DCC, ADD INDEX IDX_B95AF636A61B4DCC (ingredient_pizza_id)');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP INDEX UNIQ_9F9B6E20D41D1D42, ADD INDEX IDX_9F9B6E20D41D1D42 (pizza_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza_ingredient_pizza DROP INDEX IDX_B95AF636A61B4DCC, ADD UNIQUE INDEX UNIQ_B95AF636A61B4DCC (ingredient_pizza_id)');
        $this->addSql('ALTER TABLE pizzeria_pizza DROP INDEX IDX_9F9B6E20D41D1D42, ADD UNIQUE INDEX UNIQ_9F9B6E20D41D1D42 (pizza_id)');
    }
}
