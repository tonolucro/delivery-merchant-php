<?php
require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Delivery\Merchant\Http\Auth;
use \Tonolucro\Delivery\Merchant\Merchant;
use \Tonolucro\Delivery\Merchant\Http\Environment;

try{

    /**
     * Factory dos recursos da API
     */
    $manager = new Merchant(
        new Auth(
            'XXX' //Ver https://developers.tonolucro.com/merchant/autenticacao
        ),
        new Environment\Sandbox() //new Environment\Production()
    );

    /**
     * Instância do recurso /Merchant
     */
    $resource = $manager->getMerchantResource();

    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#informacoes
     */
    $data = $resource->getInfo();

    /**
     * Navegue no array de informações
     */
    print_r($data);

}catch (Exception $ex){
    die($ex->getMessage());
}

