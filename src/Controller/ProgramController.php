<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Repository\ProgramRepository;
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
    #[Route('/{id}', methods: ['GET'], requirements: ['id'=>'\d+'], name: 'show')]
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        //$program = $programRepository->findOneBy(['id' => $id]);
        // OU plus simple
        //$program = $programRepository->findOneById($id);
        // Si 1 seul argument
        $program = $programRepository->find(['id' => $id]);

        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }
}