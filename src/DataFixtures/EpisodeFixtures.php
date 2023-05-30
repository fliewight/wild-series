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
        $episode2->setTitle('Des bonbons et un sort');
        $episode2->setNumber(2);
        $episode2->setSeason($this->getReference('season1_Chucky'));
        $episode2->setSynopsis('Chucky cible l\'un des ennemis de Jake.');
        $manager->persist($episode2);

        $episode3 = new Episode();
        $episode3->setTitle('J\'aime bien qu\'on me dorlote');
        $episode3->setNumber(3);
        $episode3->setSeason($this->getReference('season1_Chucky'));
        $episode3->setSynopsis("Lorsque Jake est finalement poussé à bout par des intimidateurs, Chucky se remémore son premier meurtre en tant qu'humain, exhortant Jake à faire maintenant un choix : tuer ou être tué.");
        $manager->persist($episode3);

        $episode4 = new Episode();
        $episode4->setTitle("Qu'est-ce que t'as bonhomme ?");
        $episode4->setNumber(4);
        $episode4->setSeason($this->getReference('season1_Chucky'));
        $episode4->setSynopsis("Quelqu'un traque l'hôpital où les survivants de la dernière attaque de Chucky se rétablissent. Pendant ce temps, le lien entre Jake et Devon s'intensifie.");
        $manager->persist($episode4);

        $episode5 = new Episode();
        $episode5->setTitle('The Sinners Are Much More Fun');
        $episode5->setNumber(1);
        $episode5->setSeason($this->getReference('season2_Chucky'));
        $episode5->setSynopsis("Jake trouve une nouvelle piste sanglante, lorsque la nouvelle se répand qu'il y a un nouveau meurtre.");
        $manager->persist($episode5);

        $episode6 = new Episode();
        $episode6->setTitle('Hail, Mary !');
        $episode6->setNumber(2);
        $episode6->setSeason($this->getReference('season2_Chucky'));
        $episode6->setSynopsis("Jake propose de laver le cerveau de Chucky capturé et de le transformer en allié.");
        $manager->persist($episode6);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}