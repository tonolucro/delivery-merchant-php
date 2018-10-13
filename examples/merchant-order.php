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
        new Environment\Production() //new Environment\Production()
    );

    /**
     * Instância do recurso
     */
    $resource = $manager->getOrderResource();

    /**
     * Search
     */
    $query = new Query();
    $query->addFilter( $resource::customer_id, 2247);
    $query->addSort( $resource::created_at, $query::SORT_DESC);
    $query->setPage(0, 1);

    $data = $resource->done("2018-07-01", "2018-07-31", $query);
    //$data = $resource->canceled("2018-07-01", "2018-07-31", $query);

    print_r($data);

    foreach ($data['items'] as $i => $item) {

        $get = $resource->get( $item['id'] );
        print_r($get);

    }

}catch (Exception $ex){
    die($ex->getMessage());
}

