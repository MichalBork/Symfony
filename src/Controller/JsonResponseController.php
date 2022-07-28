<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\JsonResponseFromUrl;
use Symfony\Component\HttpClient\HttpClient;

class JsonResponseController extends AbstractController
{


    /**
     * @Route("/json", name="app_json_response")
     */

    public function show(): Response
    {


        $a = new JsonResponseFromUrl(HttpClient::create());
        $b = $a->index();

        return $this->render(
            'json_response/index.html.twig',
            [
                'data' => $b,
            ]
        );
    }

}
