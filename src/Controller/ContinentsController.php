<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContinentsController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function index(ContinentRepository $repository): Response
    {
        $continents = $repository->findAll();
        return $this->render('continents/index.html.twig', [
            'continents' => $continents
        ]);
    }
    /**
     * @Route("/continent/{id}", name="afficher_continent")
     */
    public function AfficherContinent(Continent $continent, $id ): Response
    {
        return $this->render('continents/continent.html.twig', [
            'continent' => $continent
        ]);
    }
}
