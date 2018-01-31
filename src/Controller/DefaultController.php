<?php

namespace App\Controller;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    /**
     * @Route("/form-post/", name="form-post")
     */
    public function formPost() {
        return $this->render("form-post.html.twig");
    }

    /**
     * @param string $name
     * @return Response
     * @Route("/", name="index")
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
        $repository = $this->getDoctrine()
            ->getRepository(Post::class);
        $post = $repository->find($id);
        return $this->render('post.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/new-post", name="new-post")
     */
    public function newPost(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle($request->get('title'));
        $post->setText($request->get('text'));
        /** @var UploadedFile $image */
//        dump($request->files);
//        die;
        $image = $request->files->get('image_path');
        copy($image->getRealPath(),
            __DIR__ . '/../../public/' .
            $image->getClientOriginalName());
        $post->setImagePath($image->getClientOriginalName());
        $em->persist($post);
        $em->flush();

        return new Response('saved new post with id '.$post->getId());
    }
}