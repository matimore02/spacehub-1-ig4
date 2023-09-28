<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModererController extends AbstractController
{
    #[Route('/moderer', name: 'app_moderer')]
    public function index(): Response
    {
        return $this->render('moderer/index.html.twig', [
            'controller_name' => 'ModererController',
        ]);
    }
}
