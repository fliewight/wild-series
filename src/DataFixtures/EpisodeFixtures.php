<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $episode1 = new Episode();
        $episode1->setTitle('Mort accidentelle');
        $episode1->setNumber(1);
        $episode1->setSeason($this->getReference('season1_Chucky'));
        $episode1->setSynopsis('Après l\'apparition d\'une poupée Chucky vintage dans un vide-grenier de banlieue, une ville américaine idyllique est plongée dans le chaos.');
        $manager->persist($episode1);

        $episode2 = new Episode();
        $episode2->setTitle('Des bonbqdflkj sbmhsdlu hsfgpi sfgdioy sgfoi cbmyi hmkh ons et un sort');
        $episode2->setNumber(2);
        $episode2->setSeason($this->getReference('season1_Chucky'));
        $episode2->setSynopsis('coihcx vmkjcvoi m hgfbm hcboim sbmkl hcsbmkh cxvmhi sbmk hxc');
        $manager->persist($episode2);

        $episode3 = new Episode();
        $episode3->setTitle('Dzgpiu sgdpi ysgfluk htg hsdfip sgpoi yqdfes bonbons et un sort');
        $episode3->setNumber(2);
        $episode3->setSeason($this->getReference('season1_Chucky'));
        $episode3->setSynopsis('dfu qdou gdpiu sgdpiu sgfp yisdfhpiu fgsp ysfgp oisgfpi sgf.');
        $manager->persist($episode3);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}