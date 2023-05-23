<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OnePageController extends AbstractController
{
    #[Route('/', name: 'app_one_page')]
    public function index(): Response
    {
        return $this->render('one_page/index.html.twig', [
            'controller_name' => 'OnePageController',
        ]);
    }
}
