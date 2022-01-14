<?php

namespace App\Entity;

/**
 * BeersFormatter:  envelope class for formats the response
 *
 */ 
class BeersFormatter {
    private $_beers;
    private $_services = [
        'search' => ['id','name','description'],
        'view' => ['id','name','description','image_url','tagline','first_brewed'],
    ];
    private $_properties_traslate = [
        'id' => 'id',
        'name' => 'nombre',
        'description' => 'descripción',
        'image_url' => 'imagen',
        'tagline' => 'slogan',
        'first_brewed' => 'first_brewed'
    ];

    /**
     * @param array $beers
     * @return void
     */
    public function __construct($response = [])
    {
        $this->_beers = (!is_null($response)) ? $response : [];
    }

    /**
     * format: set format response for a given service
     * 
     * @param string $service
     * @return array $results
     */
    public function format($service = ''): Array
    {
        $results = [];
        $targets = $this->_services[$service];
        
        foreach ($this->_beers as $index => $beer){
            $tmp = [];
            foreach ($targets as $indexTarget => $target){
                if(array_key_exists($target,$beer)){
                    $tanslate_key = $this->_properties_traslate[$target];
                    $tmp[$tanslate_key] = $beer[$target];
                }
            }
            $results[] = $tmp;
        }
        return $results;
    }
}

?>