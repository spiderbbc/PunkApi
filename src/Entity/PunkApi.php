<?php

namespace App\Entity;

use App\Entity\ApiClient;

class PunkApi
{
    private $_base_uri = 'https://api.punkapi.com';

    public function getBeersByParams($params): Array
    {
        $client = new ApiClient($this->_base_uri);
        $response = $client->getByParams("/v2/beers",$params);
        return $response;
    }

    public function formatString($str):string
    {
        return preg_replace('/\s+/', '_', $str);
    }
}
