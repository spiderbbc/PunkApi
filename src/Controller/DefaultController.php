<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(): Array
    {
        return [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ];
    }
}
