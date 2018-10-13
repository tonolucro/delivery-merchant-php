<?php
namespace Tonolucro\Delivery\Merchant\Resource;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;

class Order extends Resource
{
    const id = "id";
    const uid = "uid";
    const external_id = "external_id";
    const customer_id = "customer_id";
    const merchant_id = "merchant_id";
    const payment_type_id = "payment_type_id";
    const amount_cart = "amount_cart";
    const amount_cart_discount = "amount_cart_discount";
    const amount_shipment = "amount_shipment";
    const amount_shipment_discount = "amount_shipment_discount";
    const amount_discount = "amount_discount";
    const amount_total = "amount_total";
    const amount_change = "amount_change";
    const status = "status";
    const status_payment = "status_payment";
    const status_shipment = "status_shipment";
    const canceled_justification = "canceled_justification";
    const payment_at = "payment_at";
    const delivery_at = "delivery_at";
    const created_at = "created_at";

    /**
     * Método: https://developers.tonolucro.com/merchant/orders#informacoes-do-pedido
     * Objeto: https://developers.tonolucro.com/merchant/objetos-2#order
     *
     * @param string $uid
     * @return array
     * @throws \Exception
     */
    public function get($uid){
        try
        {
            if( !Validator::isUID($uid) ){
                throw new InvalidArgumentException();
            }

            return $this->getClient()->get('orders/'.$uid);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/orders#listagem-de-pedidos-concluidos
     *
     * @param $start
     * @param $end
     * @param Query|null $query
     * @return array
     * @throws \Exception
     */
    public function done($start, $end, Query $query=null){
        try
        {
            if( !Validator::isDate($start) || !Validator::isDate($end) ){
                throw new InvalidArgumentException();
            }

            return $this->getClient()->get('orders/done', array_merge(['start'=>$start, 'end'=> $end], ($query==null?[]:$query->toArray())));
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/orders#listagem-de-pedidos-cancelados
     *
     * @param $start
     * @param $end
     * @param Query|null $query
     * @return array
     * @throws \Exception
     */
    public function canceled($start, $end, Query $query=null){
        try
        {
            if( !Validator::isDate($start) || !Validator::isDate($end) ){
                throw new \Exception("Parametros inválidos");
            }

            return $this->getClient()->get('orders/canceled', array_merge(['start'=>$start, 'end'=> $end], ($query==null?[]:$query->toArray())));
        }catch (\Exception $exception){
            throw $exception;
        }
    }

}