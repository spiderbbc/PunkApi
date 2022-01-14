<?php

namespace App\Entity;

use App\Entity\ApiClient;

class PunkApi
{
    private $_base_uri = 'https://api.punkapi.com';

    public function getBeersByParams($food){
        $food = $this->formatString($food);
        $client = new ApiClient($this->_base_uri);
        $data = $client->getByParams("/v2/beers",$food);
        return json_decode($data, true);
    }

    public function formatString($str){
        return preg_replace('/\s+/', '_', $str);
    }
}
