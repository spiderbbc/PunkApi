<?php

namespace App\Entity;

use App\Entity\ApiClient;

/**
 * PunkApi: class that wraps calls to the PunkApi api
 *
 */ 
class PunkApi
{
    private $_base_uri = 'https://api.punkapi.com';

    /**
     * getBeersByParams: get Beers By Params to api
     * 
     * @param array $params
     * @return array $results
     */
    public function getBeersByParams($params): Array
    {
        $client = new ApiClient($this->_base_uri);
        $response = $client->getByParams("/v2/beers",$params);
        return $response;
    }

    /**
     * formatString: format string change white space to underscore
     * 
     * @param array $params
     * @return array $results
     */
    public function formatString($str):string
    {
        return preg_replace('/\s+/', '_', $str);
    }
}
