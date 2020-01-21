<?php

namespace PLDNaturalesSimulacion\Client\Model;

use \ArrayAccess;
use \PLDNaturalesSimulacion\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $PLDNaturalesSimulacionModelName = 'Respuesta';
    
    protected static $PLDNaturalesSimulacionTypes = [
        'folio' => 'string',
        'num_consulta' => 'float',
        'personas' => '\PLDNaturalesSimulacion\Client\Model\Persona[]'
    ];
    
    protected static $PLDNaturalesSimulacionFormats = [
        'folio' => null,
        'num_consulta' => null,
        'personas' => null
    ];
    
    public static function PLDNaturalesSimulacionTypes()
    {
        return self::$PLDNaturalesSimulacionTypes;
    }
    
    public static function PLDNaturalesSimulacionFormats()
    {
        return self::$PLDNaturalesSimulacionFormats;
    }
    
    protected static $attributeMap = [
        'folio' => 'folio',
        'num_consulta' => 'numConsulta',
        'personas' => 'personas'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'num_consulta' => 'setNumConsulta',
        'personas' => 'setPersonas'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'num_consulta' => 'getNumConsulta',
        'personas' => 'getPersonas'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$PLDNaturalesSimulacionModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['num_consulta'] = isset($data['num_consulta']) ? $data['num_consulta'] : null;
        $this->container['personas'] = isset($data['personas']) ? $data['personas'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolio()
    {
        return $this->container['folio'];
    }
    
    public function setFolio($folio)
    {
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getNumConsulta()
    {
        return $this->container['num_consulta'];
    }
    
    public function setNumConsulta($num_consulta)
    {
        $this->container['num_consulta'] = $num_consulta;
        return $this;
    }
    
    public function getPersonas()
    {
        return $this->container['personas'];
    }
    
    public function setPersonas($personas)
    {
        $this->container['personas'] = $personas;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
