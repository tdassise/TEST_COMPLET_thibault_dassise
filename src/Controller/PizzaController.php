<?php

declare(strict_types = 1);

namespace App\Controller;

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
     *
     * @return Response
     */
    public function detailAction(int $pizzaId): Response
    {
        return $this->render("Pizza/detail.html.twig");
    }
}
