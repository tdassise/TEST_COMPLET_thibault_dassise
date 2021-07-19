<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\PizzaRepository;
use App\Service\Dao\PizzaDao;
use NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzaController
 */
class PizzaController extends AbstractController
{
    /**
     * @Route("/pizzas", name="app_pizza_liste")
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
    public function detailAction(
        int $pizzaId,
        PizzaRepository $pizzaRepository
    ): Response
    {
        $pizza = $pizzaRepository->getIngredients($pizzaId);
        if ($pizza) {
            $cout = $pizza->getCout();
            $currencyFormat = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

            return $this->render("Pizza/detail.html.twig", [
                'pizza' => $pizza,
                'cout' => $currencyFormat->formatCurrency($cout, 'EUR'),
            ]);
        }
        return $this->redirectToRoute("app_pizza_liste");
    }
}
