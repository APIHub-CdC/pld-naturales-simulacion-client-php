# telcos-simulacion-client-php

Presenta los creditos de la persona con servicios con domicilio asociado de: telefonía celular; televisión de paga; y, telefonía local y de larga distancia (entorno de simulación).

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir os siguientes pasos:

 1. Dar clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
 4. Al abrirse la ventana emergente, seleccionar el producto.
 5. Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en ***test/Api/TelcosSimulacionApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
    $handler = \GuzzleHttp\HandlerStack::create();
    $config = new \TelcosSimulacion\Client\Configuration();
    $config->setHost('the_url');

    $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
    $this->apiInstance = new \TelcosSimulacion\Client\Api\TelcosSimulacionApi($client,$config);
}  
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/TelcosSimulacionApiTest.php 

*/
public function testGetReporte()
{
    $x_api_key = "your_api_key";

    $requestDomicilio = new \TelcosSimulacion\Client\Model\DomicilioPeticion();
    $requestEstado = new \TelcosSimulacion\Client\Model\CatalogoEstados();
    $requestTipoDom = new \TelcosSimulacion\Client\Model\CatalogoTipoDomicilio();
    $requestTipoAsent = new \TelcosSimulacion\Client\Model\CatalogoTipoAsentamiento();

    $requestDomicilio->setDireccion(null);
    $requestDomicilio->setColonia(null);
    $requestDomicilio->setMunicipio(null);
    $requestDomicilio->setCiudad(null);
    $requestDomicilio->setEstado($requestEstado::CDMX);
    $requestDomicilio->setCodigoPostal(null);
    $requestDomicilio->setFechaResidencia(null);
    $requestDomicilio->setNumeroTelefono(null);
    $requestDomicilio->setTipoDomicilio($requestTipoDom::O);
    $requestDomicilio->setTipoAsentamiento($requestTipoAsent::_0);

    $requestPersona = new \TelcosSimulacion\Client\Model\PersonaPeticion();
    $requestResidencia = new \TelcosSimulacion\Client\Model\CatalogoResidencia();
    $requestEdoCivil = new \TelcosSimulacion\Client\Model\CatalogoEstadoCivil();
    $requestSexo = new \TelcosSimulacion\Client\Model\CatalogoSexo();
    
    $requestPersona->setPrimerNombre("NOMBRE");
    $requestPersona->setSegundoNombre(null);
    $requestPersona->setApellidoPaterno("PATERNO");
    $requestPersona->setApellidoMaterno("MATERNO");
    $requestPersona->setApellidoAdicional(null);
    $requestPersona->setFechaNacimiento("27-06-1986");
    $requestPersona->setRfc(null);
    $requestPersona->setCurp(null);
    $requestPersona->setNumeroSeguridadSocial(null);
    $requestPersona->setNacionalidad(null);
    $requestPersona->setResidencia($requestResidencia::_1);
    $requestPersona->setEstadoCivil($requestEdoCivil::S);
    $requestPersona->setSexo($requestSexo::M);
    $requestPersona->setClaveElector(null);
    $requestPersona->setNumeroDependientes(null);
    $requestPersona->setFechaDefuncion(null);
    $requestPersona->setDomicilio($requestDomicilio);        

    try {
        $result = $this->apiInstance->getReporte($x_api_key, $requestPersona);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TelcosSimulacionApi->getReporte: ', $e->getMessage(), PHP_EOL;
    }
}
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
