<?php

namespace PLDNaturalesSimulacion\Client;

use \PLDNaturalesSimulacion\Client\Configuration;
use \PLDNaturalesSimulacion\Client\ApiException;
use \PLDNaturalesSimulacion\Client\ObjectSerializer;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \PLDNaturalesSimulacion\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $this->apiInstance = new \PLDNaturalesSimulacion\Client\Api\PLDNaturalesSimulacionApi($client,$config);
    }
    
    public function testPldNaturales()
    {
        $x_api_key = "your_api_key";

        $request = new \PLDNaturalesSimulacion\Client\Model\Peticion();
        
        $request->setFolio("000008");
        $request->setTipoDocumento("01");
        $request->setNumeroDocumento("01");
        $request->setNombre("Maria");
        $request->setSegundoNombre(null);
        $request->setApellidoPaterno("Sanchez");
        $request->setApellidoMaterno("Mathews");

        try {
            $result = $this->apiInstance->pld($x_api_key, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->pld: ', $e->getMessage(), PHP_EOL;
        }
    }
}
