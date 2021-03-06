<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HelloController extends AbstractController
{
    #[Route('/')]
    public function index()
    {
//        $res = new Response();
//        $res->setStatusCode(200);
//        $res->setContent('Hello Symfony');
//        $res->headers->set('Content-type', 'text/plain');
        // $res = new Response('Hello Symfony', 200, ['Content-type' => 'text/plain']);
        $res = new Response(status: 200);
        $res->setContent('<body>Helloworld !!!</body>');
        $res->headers->set('Content-type', 'text/html');
        return $res;
    }

    #[Route('/hello/{name}', requirements: ['name' => '\p{L}+'])]
    public function hello(string $name)
    {
//        $res = new Response();
//        $res->setStatusCode(200);
//        $res->setContent('Hello Symfony');
//        $res->headers->set('Content-type', 'text/plain');
        // $res = new Response('Hello Symfony', 200, ['Content-type' => 'text/plain']);
        //$res = new Response(status: 200);
        //$res->setContent(json_encode(['msg' => 'Hello ' . $name]));
        //$res->headers->set('Content-type', 'application/json');
        //return $res;



        // return new JsonResponse(['msg' => 'Hello ' . $name]);
        return $this->json(['msg' => 'Hello ' . $name]);
    }


}
