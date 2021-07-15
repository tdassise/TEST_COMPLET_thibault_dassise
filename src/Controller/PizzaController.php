<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Pizza;
use App\Service\Dao\PizzaDao;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzaController
 */
class PizzaController extends AbstractController
{
    /**
     * @Route("/pizzas")
     *
     * @param PizzaDao $pizzaDao
     *
     * @return Response
     */
    public function listeAction(PizzaDao $pizzaDao): Response
    {
        // récupération des différentes pizzas
        $pizzas = $pizzaDao->getAllPizzas();

        return $this->render("Pizza/liste.html.twig", [
            "pizzas" => $pizzas,
        ]);
    }

    /**
     * @Route(
     *     "/pizzas/detail-{pizzaId}",
     *     requirements={"pizzaId": "\d+"}
     * )
     *
     * @param int $pizzaId
     * @param PizzaDao $pizzaDao
     *
     * @return Response
     */
    public function detailAction(int $pizzaId, PizzaDao $pizzaDao): Response
    {
        // Récupération de l'id de la pizza 
        $idPizza = $this->getDoctrine()->getRepository(Pizza::class)->find($pizzaId);

        // Récupération du nom de la pizza
        $nomPizza = $idPizza->getNom();

        // Récupération des ingrédients de la pizza
        $ingPizza = $pizzaDao->getDetailPizza($pizzaId);

        // Affichage via le twig
        return $this->render("Pizza/detail.html.twig", ["nomPizza" => $nomPizza, "ingPizza" => $ingPizza]);
    }
}
