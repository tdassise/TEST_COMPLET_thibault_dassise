<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Ingredient;
use App\Entity\IngredientPizza;
use App\Entity\Pizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class PizzaRepository
 */
class PizzaRepository extends ServiceEntityRepository
{
    /**
     * PizzaRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizza::class);
    }

    /**
     * @param int $pizzaId
     * @return Pizza
     */
    public function findPizzaAvecDetailComplet($pizzaId): Pizza
    {
        // test si l'id de la pizza est bien un nombre supérieur à 0
        if (!is_numeric($pizzaId) || $pizzaId <= 0) {
            throw new \Exception("Impossible de d'obtenir le détail de la pizza ({$pizzaId}).");
        }

        // création du query builder avec l'alias p pour pizza
        $qb = $this->createQueryBuilder("p");

        // création de la requête
        $qb
            ->addSelect(["qte", "ing"])
            ->innerJoin("p.quantiteIngredients", "qte")
            ->innerJoin("qte.ingredient", "ing")
            ->where("p.id = :idPizza")
            ->setParameter("idPizza", $pizzaId);

        // exécution de la requête
        return $qb->getQuery()->getSingleResult();
    }

    /**
     * @var $pizzaId: int id de la pizza
     * @return Pizza|null|bool
     */
    public function getIngredients(int $pizzaId): Pizza
    {
        $qb = $this->createQueryBuilder('p');
        $qb->innerJoin(IngredientPizza::class, 'ip', Join::WITH, 'p.id = ip.pizza')
            ->innerJoin(Ingredient::class, 'i', Join::WITH, 'i.id = ip.ingredient')
            ->where('p.id = :pizzaId')
            ->setParameter('pizzaId', $pizzaId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
