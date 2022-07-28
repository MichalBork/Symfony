<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DataFromFile;

class DataFromFileController extends AbstractController
{


    /**
     * @Route("/file", name="app_file")
     */




    public function index(): Response
    {
        $a = new DataFromFile('C:\xampp3\htdocs\sklepSymfony\shopOnline\public\cities.csv');



        return $this->render('abc/index.html.twig', [
            'data' =>   $a->readFile(),
        ]);
    }
}
