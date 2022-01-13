<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;

class ListController extends AbstractController
{
    /**
     * @Rest\Get("/list", name="list")
     */
    public function index(): Array
    {
        return [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ListController.php',
        ];
    }

    /**
     * @Rest\Get("/view/{id}", name="view", requirements={"id" = "\d+"})
     */
    public function view($id): Array
    {
        return [
            'message' =>  $id,
            'path' => 'src/Controller/ListController.php (view)',
        ];
    }
}
