<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program1 = new Program();
        $program1->setTitle('Chucky');
        $program1->setSynopsis('Lorsqu\'une vieille poupée Chucky fait son apparition dans un vide-greniers de quartier, une paisible petite ville américaine se retrouve plongée en plein chaos, et une série de terribles meurtres commence à dévoiler les secrets des habitants.');
        $program1->setCategory($this->getReference('category_Horreur'));
        $this->addReference('program_Chucky', $program1);
        $manager->persist($program1);

        $program2 = new Program();
        $program2->setTitle('Notre belle famille');
        $program2->setSynopsis("Frank Lambert et Carol Foster se marient sur un coup de tête, alors qu'ils sont déjà parents de trois enfants chacun. Le problème est que ces deux familles sont très différentes, presque opposées, et la cohabitation ne va pas être facile !");
        $program2->setCategory($this->getReference('category_Comédie'));
        $this->addReference('program_NotreBelleFamille', $program2);
        $manager->persist($program2);

        $program3 = new Program();
        $program3->setTitle('Narcos');
        $program3->setSynopsis("Loin d’un simple biopic de Pablo Escobar, Narcos retrace la lutte acharnée des États-Unis et de la Colombie contre le cartel de la drogue de Medellín, l’organisation la plus lucrative et impitoyable de l’histoire criminelle moderne. En multipliant les points de vue — policier, politique, judiciaire et personnel — la série dépeint l’essor du trafic de cocaïne et le bras de fer sanglant engagé avec les narcotrafiquants qui contrôlent le marché avec violence et ingéniosité.");
        $program3->setCategory($this->getReference('category_Suspense'));
        $this->addReference('program_Narcos', $program3);
        $manager->persist($program3);

        $program4 = new Program();
        $program4->setTitle('Walking Dead');
        $program4->setSynopsis("Après une apocalypse ayant transformé la quasi-totalité de la population en zombies, un groupe d'hommes et de femmes mené par l'officier Rick Grimes tente de survivre... Ensemble, ils vont devoir tant bien que mal faire face à ce nouveau monde devenu méconnaissable, à travers leur périple dans le Sud profond des États-Unis.");
        $program4->setCategory($this->getReference('category_Horreur'));
        $this->addReference('program_WalkingDead', $program4);
        $manager->persist($program4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }


}