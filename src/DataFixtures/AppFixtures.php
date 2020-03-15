<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Boolean;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $allCategories = ["Art"=>[], "Arts and crafts"=>[], "BD"=>[], "Cinema and video"=>[], "Dance"=>[], "Design"=>[],
            "Editing"=>[], "gastronomy"=>[], "Games"=>["Video game","Board game"], "Journalism"=>[], "Mode"=>[],
            "Music"=>[], "Photography"=>[], "Technology"=>[], "Theater"=>[]];

        $allStatus = ["Currently funding", "Funded", "Ended"];

        foreach ($allCategories as $category => $subCategories) {
            $newCategory = new Category();
            $newCategory->setName($category);
            $manager->persist($newCategory);

            if(isset($subCategories[0])) {
                foreach ($subCategories as $subCategory) {
                    $newSubCategory = new Category();
                    $newSubCategory->setName($subCategory);
                    $manager->persist($newSubCategory);

                    $newCategory->addCategory($newSubCategory);
                }
            }
        }

        foreach ($allStatus as $status) {
            $newStatus = new Status();
            $newStatus->setName($status);
            $manager->persist($newStatus);
        }


        $manager->flush();
    }
}
