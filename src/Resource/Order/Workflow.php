<?php
namespace Tonolucro\Delivery\Merchant\Resource\Order;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Resource\Resource;

class Workflow extends Resource
{
    /**
     * Método: https://developers.tonolucro.com/merchant/orders-workflow#fluxos-do-pedido
     *
     * @param int $order_id
     * @return array
     * @throws \Exception
     */
    public function get($order_id){
        try
        {
            if( !Validator::isID($order_id) ){
                throw new InvalidArgumentException();
            }

            return $this->getClient()->get('orders/'.$order_id.'/workflow');
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/orders-workflow#executar-fluxos
     *
     * @param int $order_id
     * @param $action
     * @param $notes
     * @return mixed
     * @throws \Exception
     */
    public function action($order_id, $action, $notes=''){
        try
        {
            if( !Validator::isID($order_id) || Validator::isEmpty($action) ){
                throw new InvalidArgumentException();
            }

            $result = $this->getClient()->put('orders/'.$order_id.'/workflow', ['action'=>$action, 'notes'=>$notes]);

            return $result['success'];

        }catch (\Exception $exception){
            throw $exception;
        }
    }
}