<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Entity\Famille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $continent1 = new Continent();
        $continent1->setLibelle("Europe");
        $manager->persist($continent1);
        $continent2 = new Continent();
        $continent2->setLibelle("Asie");
        $manager->persist($continent2);
        $continent3 = new Continent();
        $continent3->setLibelle("Afrique");
        $manager->persist($continent3);
        $continent4 = new Continent();
        $continent4->setLibelle("Océanie");
        $manager->persist($continent4);
        $continent5 = new Continent();
        $continent5->setLibelle("Amérique");
        $manager->persist($continent5);

        $c1 = new Famille();
        $c1->setLibelle("mammifère")
            ->setDescription("Animaux vertèbres nourrissant leurs petits avec du lait");
        $manager->persist($c1);

        $c2 = new Famille();
        $c2->setLibelle("reptiles")
            ->setDescription("Animaux vertèbres qui rampent");
        $manager->persist($c2);

        $c3 = new Famille();
        $c3->setLibelle("poissons")
            ->setDescription("Animaux vertèbres du monde aquatique");
        $manager->persist($c3);

        // $product = new Product();
        // $manager->persist($product);
        $a1 = new Animal();
        $a1->setNom("Chien")
            ->setDescription("un animal domestique")
            ->setImage("chien.png")
            ->setPoids(10)
            ->setDangereux(false)
            ->setFamille($c1)
            ->addContinent($continent1)
            ->addContinent($continent2)
            ->addContinent($continent3)
            ->addContinent($continent4)
            ->addContinent($continent5)
            ;

        $manager->persist($a1);
    

        $a2 = new Animal();
        $a2->setNom("Cochon")
            ->setDescription("un animal d'élevage")
            ->setImage("cochon.png")
            ->setPoids(300)
            ->setDangereux(true)
            ->setFamille($c1)
            ->addContinent($continent1)
            ->addContinent($continent5)
            ;
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("Serpent")
            ->setDescription("un animal dangereux")
            ->setImage("serpent.png")
            ->setPoids(50)
            ->setDangereux(true)
            ->setFamille($c2)
            ->addContinent($continent2)
            ->addContinent($continent3)
            ->addContinent($continent4)
            ;
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("Crocodile")
            ->setDescription("un animal très dangereux")
            ->setImage("croco.png")
            ->setPoids(500)
            ->setDangereux(true)
            ->setFamille($c2)
            ->addContinent($continent3)
            ->addContinent($continent4)
            ;
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom("Requin")
            ->setDescription("un animal marin très dangereux")
            ->setImage("requin.png")
            ->setPoids(800)
            ->setDangereux(true)
            ->setFamille($c3)
            ->addContinent($continent4)
            ->addContinent($continent5)
            ;
        $manager->persist($a5);

        
        $manager->flush();
    }
}