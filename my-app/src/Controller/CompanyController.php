<?php

namespace App\Controller;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{


    #[Route('/companies')]
    public function index(CompanyRepository $repo): Response
    {
        // $doctrine = $this->container->get('doctrine');
        // $repo = $doctrine->getRepository(Company::class);

        $companies = $repo->findBy([], limit: 100);

        return $this->render('company/index.html.twig', [
            'companies' => $companies,
        ]);
    }
}
