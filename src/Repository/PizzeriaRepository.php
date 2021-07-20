<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Pizzeria;
use App\Entity\Pizza;
use App\Entity\IngredientPizza;
use App\Entity\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * Class PizzeriaRepository
 */
class PizzeriaRepository extends ServiceEntityRepository
{
    /**
     * PizzeriaRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizzeria::class);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        // exécution de la requête
        return parent::findAll();
    }

    /**
     * @param int $pizzeriaId
     * @return Pizzeria
     */
    public function findCartePizzeria($pizzeriaId): ?Pizzeria
    {
        $qb = $this->createQueryBuilder('cp');       // cp = carte pizzeria
        $qb->innerJoin(Pizza::class, 'p', Join::WITH, 'cp.id = p.pizzeria')
            ->innerJoin(IngredientPizza::class, 'ip', Join::WITH, 'cp.id = ip.pizza')
            ->innerJoin(Ingredient::class, 'i', Join::WITH, 'i.id = ip.ingredient')
            ->where('cp.id = :pizzeriaId')
            ->setParameter('pizzeriaId', $pizzeriaId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
