<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PizzeriaRepository;
use App\Repository\PizzaRepository;
use App\Service\Dao\PizzeriaDao;
use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use NumberFormatter;

/**
 * Class PizzeriaController
 */
class PizzeriaController extends AbstractController
{
    /**
     * @Route("/pizzerias")
     *
     * @param PizzeriaDao $pizzeriaDao
     *
     * @return Response
     */
    public function listeAction(PizzeriaDao $pizzeriaDao): Response
    {
        // récupération des différentes pizzéria de l'application
        $pizzerias = $pizzeriaDao->getAllPizzerias();

        return $this->render("Pizzeria/liste.html.twig", [
            "pizzerias" => $pizzerias,
        ]);
    }

    /**
     * @Route(
     *     "/pizzerias/carte-{pizzeriaId}",
     *     requirements={"pizzeriaId": "\d+"}
     * )
     *
     * @param int $pizzeriaId
     *
     * @return Response
     */
    public function detailAction(
        $pizzeriaId,
        PizzeriaRepository $pizzeriaRepository
    ): Response {
        $pizzeria = $pizzeriaRepository->findCartePizzeria($pizzeriaId);
        if ($pizzeria) {
            $currencyFormat = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
            $carte = [];
            foreach ($pizzeria->getPizzas() as $pizza) {
                $carte[] = [
                    'nomPizza' => $pizza->getNom(),
                    'prixPizza' => $currencyFormat->formatCurrency($pizza->getPrix($pizzeria->getMarge()), 'EUR')
                ];
            }
            return $this->render("Pizzeria/carte.html.twig", [
                'pizzeria' => $pizzeria,
                'carte' => $carte,
            ]);
        }
        return $this->redirectToRoute("app_pizzeria_liste");
    }
}
