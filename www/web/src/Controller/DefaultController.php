<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        $response = new Response();
        $response->setContent(json_encode(
            [
                [
                'id' => 678,
                'title' => 'asdfasf',
                ],
                [
                    'id' => 890,
                    'title' => '1asdfasd3',
                ],
                [
                    'id' => 126,
                    'title' => 'sfaasfdasfda',
                ]
            ]
        ));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin','http://localhost:3000');

        return $response;
    }

}