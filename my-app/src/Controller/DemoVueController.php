<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoVueController extends AbstractController
{
    #[Route('/demo/vue', name: 'app_demo_vue')]
    public function index(): Response
    {
        return $this->render('demo_vue/index.html.twig', [
            'controller_name' => 'DemoVueController',
        ]);
    }
}
