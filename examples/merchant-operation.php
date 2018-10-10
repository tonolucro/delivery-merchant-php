<?php
require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Delivery\Merchant\Http\Auth;
use \Tonolucro\Delivery\Merchant\Merchant;
use \Tonolucro\Delivery\Merchant\Http\Environment;

try{

    $dotenv = new \Dotenv\Dotenv(__DIR__);
    $dotenv->load();
    $token = getenv('TOKEN');

    /**
     * Factory dos recursos da API
     */
    $manager = new Merchant(
        new Auth(
            $token //Ver https://developers.tonolucro.com/merchant/autenticacao
        ),
        new Environment\Sandbox() //new Environment\Production()
    );

    /**
     * Instância do recurso /Merchant
     */
    $resource = $manager->getMerchantResource();

    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#funcionamento
     */
    $data = $resource->getOperation();

    /**
     * Navegue no array de informações
     * Documentação: https://developers.tonolucro.com/merchant/objetos#merchant-operation
     */
    print_r($data);


    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#abrir-ou-fechar
     */
    $result = $resource->updateOperation(false, 10);

    /**
     * Navegue no array de informações
     * Documentação: https://developers.tonolucro.com/merchant/objetos#merchant-operation
     */
    print_r($result);

}catch (Exception $ex){
    die($ex->getMessage());
}

