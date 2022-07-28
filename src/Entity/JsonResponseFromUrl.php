<?php


namespace App\Entity;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class JsonResponseFromUrl
{

    private $client;


    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function index()
    {

        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/todos'

        );

        $response = json_decode($response->getContent(), true);
        return   $response ;

    }

}