<?php

namespace App\Entity;

use App\Entity\ApiClient;

class PunkApi
{
    private $_base_uri = 'https://api.punkapi.com';

    public function getBeersByParams($params): Array
    {
        $params = $this->_formatString($params);
        
        $client = new ApiClient($this->_base_uri);
        $response = $client->getByParams("/v2/beers",$params);
        return $response;
    }

    private function _formatString($str): string
    {
        return preg_replace('/\s+/', '_', $str);
    }
}
