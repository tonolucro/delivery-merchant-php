<?php
require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Delivery\Merchant\Http\Auth;
use \Tonolucro\Delivery\Merchant\Http\Environment;
use \Tonolucro\Delivery\Merchant\Http\Query;
use \Tonolucro\Delivery\Merchant\Merchant;

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
     * Instância do recurso
     */
    $resourceSalesProduct = $manager->getSalesProductResource();
    $resourceExternalID = $manager->getExternalIDResource();

    /**
     * Search SalesProduct
     */
    $query = new Query();
    $query->addSort( $resourceSalesProduct::id, $query::SORT_ASC);
    $query->setPage(0, 1);

    $data = $resourceSalesProduct->search($query);

    print_r($data);

    foreach ($data['items'] as $i => $item) {

        $put = $resourceExternalID->update( $item['uid'], uniqid());
        var_dump($put);

    }

    /**
     * Search
     */
    $query = new Query();
    $query->setPage(0, 1);

    $data = $resourceExternalID->search($query);

    print_r($data);

    foreach ($data['items'] as $i => $item) {

        $get = $resourceExternalID->get( $item['uid'] );
        print_r($get);

        break;
    }


}catch (Exception $ex){
    die($ex->getMessage());
}

