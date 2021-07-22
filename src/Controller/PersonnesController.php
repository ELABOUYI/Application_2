<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnesController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function index(PersonneRepository $repository): Response
    {
        $personnes=$repository->findAll();
        return $this->render('personnes/index.html.twig', [
            'personnes' => $personnes
        ]);
    }
    /**
     * @Route("/personne/{id}", name="afficher_personne")
     */
    public function AfficherPersonne(Personne $personne): Response
    {
        return $this->render('personnes/afficherPersonne.html.twig', [
            'personne' => $personne
        ]);
    }
}
