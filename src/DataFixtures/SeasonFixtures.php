<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $season1 = new Season();
        $season1->setNumber(1);
        $season1->setProgram($this->getReference('program_Chucky'));
        $season1->setYear(2021);
        $season1->setDescription('Lorsqu\'une vieille poupée Chucky fait son apparition dans un vide-greniers de quartier, une paisible petite ville américaine se retrouve plongée en plein chaos, et une série de terribles meurtres commence à dévoiler les secrets des habitants.');
        $this->addReference('season1_Chucky', $season1);
        $manager->persist($season1);

        $season2 = new Season();
        $season2->setNumber(2);
        $season2->setProgram($this->getReference('program_Chucky'));
        $season2->setYear(2022);
        $season2->setDescription('Chucky croise le chemin d\'ennemis jurés, d\'anciens alliés et de nouvelles proies, alors qu\'il cherche à inspirer la peur et le chaos partout où il passe. Après que son plan diabolique d\'envahir ...');
        $this->addReference('season2_Chucky', $season2);
        $manager->persist($season2);

        $season3 = new Season();
        $season3->setNumber(3);
        $season3->setProgram($this->getReference('program_Chucky'));
        $season3->setYear(2023);
        $season3->setDescription('A venir ...');
        $this->addReference('season3_Chucky', $season3);
        $manager->persist($season3);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}