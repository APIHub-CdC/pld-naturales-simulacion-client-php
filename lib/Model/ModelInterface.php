<?php

namespace PLDNaturalesSimulacion\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function PLDNaturalesSimulacionTypes();
    
    public static function PLDNaturalesSimulacionFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
