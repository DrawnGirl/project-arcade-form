<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminArcadeController extends AbstractController
{
    #[Route('/admin/arcade', name: 'app_admin_arcade')]
    public function index(): Response
    {
        return $this->render('admin_arcade/index.html.twig', [
            'controller_name' => 'AdminArcadeController',
        ]);
    }
}
