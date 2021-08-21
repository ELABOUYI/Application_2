<?php

namespace App\Controller;

//use App\Entity\Animal;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="animaux")
     */
    // public function index(): Response
    // {
    //     /**
    //      * nous allons utiliser le repository qui permet de récupérer des informations de la BdD
    //      * Pour cela nous utiliserons doctrine pour récupérer le répository et enfin nous pouvons 
    //      * utiliser la fonction de base du repository findAll qui va permettre de récupérer tous les animaux
    //      * Une fois que nous avons récupérer tous les animaux nous pourons transmettre la variable comme une
    //      * information dans le template qui se chargera d'afficher les animaux.
    //      */
    //     //Récupération du répository lié à l'entity animal
    //     $repository = $this->getDoctrine()->getRepository(Animal::class);//dans l'argument en indique à partir de quelle classe on veut récupérer le répository
    //     $animaux = $repository->findAll();
    //     //En renvoie la propriété "animaux" qui sera ensuite utilisable en twig graçe à la syntaxe json
    //     return $this->render('animal/index.html.twig', [
    //         "animaux"=>$animaux
    //     ]);
    // }
    public function index(AnimalRepository $repository): Response
    {
        /**
         * on poura ne pas utiliser la ligne 26 en ceci en utilisons l'injection de dépondence
         * càd que dans l'argument de la fonction en va indiquer ce que nous voullons récupérer
         * Donc en indique qu'on veut récupérer la variable $repository et en indique de c'est une 
         * AnimalRepository de base symfony fait le lien et sais qu'on veut allez récupérer un répository
         * de la class Animal cela permet de récupérer d'une façon automatique le répository qu'on pourra 
         * utilisé directement.
         */
        $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig', [
            "animaux"=>$animaux
        ]);
    }

    /**
     * @Route("/animal/{id}", name="afficher_animal")
     */
    // // $id dans l'argument est récupérer pour pouvoir l'utiliser dans la fonction find afin de n'afficher
    // //que les données de l'animal ayant cet id
    // public function AfficherAnimal(AnimalRepository $repository, $id)
    // {
    //     // la variable $animal récupére l'animal ayant pour identifiant la variable $id
    //     // mais d'abord il faut faire l'injection de dépendance pour récupérer le repository lié au animaux
    //     $animal = $repository->find($id);
    //     //Envoyer l'animal récupérer par la fonction find() à la vue
    //     return $this->render('animal/animal.html.twig',[
    //         'animal'=>$animal
    //     ]);
    // }

    //Utilisation du parameteur converteur
    // Pour cela on modifier ce qui est dans l'argument de la fonction et en indique qu'on veut récupérer un animal
    // Donc on indique directement la classe après on met le paramettre et dans ce cas symfony utilise automatiquement l'id dans la route pour récupérer l'animal correspondant

    public function AfficherAnimal(Animal $animal)
    {
       return $this->render('animal/animal.html.twig',[
        'animal'=>$animal
    ]);
    }
    
}
