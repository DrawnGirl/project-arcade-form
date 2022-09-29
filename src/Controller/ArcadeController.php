<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArcadeController extends AbstractController
{
    #[Route('/', name: 'app_arcade')]
    public function index(): Response
    {
        return $this->render('arcade/index.html.twig', [
            'controller_name' => 'ArcadeController',
        ]);
    }
}
