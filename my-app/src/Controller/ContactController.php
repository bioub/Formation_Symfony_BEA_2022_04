<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contacts', requirements: ['id' => '[1-9][0-9]*'])]
class ContactController extends AbstractController
{
    #[Route(methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => '<script>alert("XSS")</script>',
        ]);
    }

    #[Route('/add', methods: ['GET', 'POST'])]
    public function create(): Response
    {
        return $this->render('contact/create.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(): Response
    {
        return $this->render('contact/show.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/{id}/delete', methods: ['GET', 'POST'])]
    public function delete(): Response
    {
        return $this->render('contact/delete.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/{id}/update', methods: ['GET', 'POST'])]
    public function update(): Response
    {
        return $this->render('contact/update.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
