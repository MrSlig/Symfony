<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {
    /**
     * @Route("/{name}", name="index")
     */
    public function index(string $name = 'Гость') {
//        $response = new Response('<h1>Привет ' . $name . '!</h1>');
//        return $response;
    return $this->render('index.html.twig', [
        'name' => $name,
        'list' => [
            'Вася',
            'Петя',
            'Рома',
            ]
        ]);
    }

    /**
     * @param $id
     * @return Response
     * @Route("/post/{id}", name="get_post")
     */
    public function getPost($id) {
        return $this->render('post.html.twig', [
            'id' => $id,
        ]);
    }
}