<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PunkApi;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;

class ListController extends AbstractController
{
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
        $data = $client->getBeersByParams(['food' => $food]);
        
        return [
            'data' => $data,
        ];
    }

    /**
     * @Rest\Get("/beers/view/{id}", name="view", requirements={"id" = "\d+"})
     */
    public function view($id): Array
    {
        $client = new PunkApi();
        $data = $client->getBeersByParams(['ids' => $id]);
        
        return [
            'data' => $data,
        ];
    }
}
