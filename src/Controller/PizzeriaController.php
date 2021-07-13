<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\Dao\PizzeriaDao;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function detailAction($pizzeriaId): Response
    {
        return new Response("Carte de la pizzéria {$pizzeriaId}");
    }
}
