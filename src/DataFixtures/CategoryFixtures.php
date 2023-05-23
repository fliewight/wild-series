<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Category 1',
        'Category 2',
        'Category 3',
        'Category 4',
        'Category 5',
        'Category 6',
        'Category 7',
        'Category 8',
        'Category 9',
        'Category 10',
        'Category 11',
        'Category 12',
        'Category 13',
        'Category 14',
        'Category 15',
        'Category 16',
        'Category 17',
        'Category 18',
        'Category 19',
        'Category 20',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categoryName)
        {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
        }
        $manager->flush();
    }

    /*public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Horreur');
        $manager->persist($category);
        $manager->flush();*/

        // Générer plusieurs catégories en fixtures
        /*for ($i = 1; $i <= 50; $i++) {  
            $category = new Category();  
            $category->setName('Nom de catégorie ' . $i);  
            $manager->persist($category);  
        }  
        $manager->flush();
    }*/
}