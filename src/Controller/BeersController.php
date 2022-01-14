<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PunkApi;
use App\Entity\BeersFormatter;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;

class BeersController extends AbstractController
{

    /**
     * @Rest\Get("/beers", name="beers")
     */
    public function index(): Array
    {
        return [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BeersController.php',
        ];
    }
    /**
     * @Rest\Get(
     *      "/beers/search",
     *      name="search",
     * )
     */
    public function search(Request $request): Array
    {
        $client = new PunkApi();
        $food = !is_null($request->query->get('food')) ? $request->query->get('food') : ' ' ;
        $response = $client->getBeersByParams(['food' => $food]);

        $beers = (new BeersFormatter($response))->format('search');
        
        return [
            'data' => $beers,
        ];
    }

    /**
     * @Rest\Get("/beers/view/{id}", name="view", requirements={"id" = "\d+"})
     */
    public function view($id): Array
    {
        $client = new PunkApi();
        $response = $client->getBeersByParams(['ids' => $id]);
        $beers = (new BeersFormatter($response))->format('view');
        return [
            'data' => $beers,
        ];
    }
}
