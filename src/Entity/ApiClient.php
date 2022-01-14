<?php

namespace App\Entity;

use GuzzleHttp\Client;

/**
 * ApiClient: envelope class for requests using guzzle library
 *
 */ 
class ApiClient
{
    private $_client;

    public function __construct($base_uri)
    {
        $this->_client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $base_uri,
        ]);
    }

    /**
     * getByParams: return the response of type get by params 
     *
     * @param string  $endpoint  endpoint for base_uri
     * @param array   $params params for query
     * 
     * @return mixed
     */ 
    public function getByParams($endpoint,$params = []): Array
    {
        $response = $this->_client->request('GET', $endpoint,[
            'query' => $params
        ]);
        $response->getHeaderLine('application/json');
        return $response->getStatusCode() == 200 ? json_decode($response->getBody()->getContents(),true) : [];
    }
    
}
