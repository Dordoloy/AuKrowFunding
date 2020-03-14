<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $jeu = new Category();
        $jeu->setName("Jeu");

        $jeuVideo = new Category();
        $jeuVideo->setName("Jeu vidéo");

        $jeu->addSubCategory($jeuVideo);

        $manager->flush();
    }
}
