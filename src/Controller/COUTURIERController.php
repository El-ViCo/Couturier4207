<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class COUTURIERController extends AbstractController
{
    /**
     * @Route("/couturier", name="couturier")
     */
    public function index(): Response
    {
        return $this->render('couturier/index.html.twig', [
            'controller_name' => 'COUTURIERController',
        ]);
    }
}
