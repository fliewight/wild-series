<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
Class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
         $programs = $programRepository->findAll();

         return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    // On utilise un pattern \d+ pour que l'ID soit obligatoirement un entier
    #[Route(
        '/{id}',
        name: 'show',
        methods: ['GET'],
        requirements: ['id'=>'\d+']
    )]
    public function show(int $id, ProgramRepository $programRepository, SeasonRepository $seasonsRepository): Response
    {
        // $program = $programRepository->findOneBy(['id' => $id]);
        // OU plus simple
        // $program = $programRepository->findOneById($id);
        // Si 1 seul argument
        $program = $programRepository->find(['id' => $id]);
        $seasons = $seasonsRepository->findAll($program);
        //dd($seasons); // Liste des saisons -> OK

        return $this->render('program/show.html.twig', [
            'program' => $program,
            'seasons' => $seasons,
        ]);
    }

    #[Route(
        '/{programId}/seasons/{seasonId}',
        name: 'season_show',
        methods: ['GET'],
        requirements: ['programId' => '\d+', 'seasonId' => '\d+'],
    )]
    public function showSeason(int $programId, ProgramRepository $programRepository, int $seasonId, SeasonRepository $seasonRepository):Response
    {
        $program = $programRepository->findOneBy(['id' => $programId]);
        $season = $seasonRepository->find($seasonId);

        if (!$program) {
            throw $this->createNotFoundException("La catégorie demandée n'existe pas");
        }

        if (!$season) {
            throw $this->createNotFoundException("La saison demandée n'existe pas");
        }

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);
    }
}