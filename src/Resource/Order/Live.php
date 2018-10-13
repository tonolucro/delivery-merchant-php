<?php
namespace Tonolucro\Delivery\Merchant\Resource\Order;

use Tonolucro\Delivery\Merchant\Resource\Resource;
use Tonolucro\Delivery\Merchant\Http\Query;

class Live extends Resource
{
    const order_id = "order_id";
    const order_uid = "order_uid";
    const external_id = "external_id";
    const status = "status";
    const amount_total = "amount_total";
    const payment_type_id = "payment_type_id";
    const payment_prepaid = "payment_prepaid";
    const customer_id = "customer_id";
    const customer_name = "customer_name";
    const customer_phone = "customer_phone";
    const address_delivery = "address_delivery";
    const started_at = "started_at";
    const update_at = "update_at";

    /**
     * Método: https://developers.tonolucro.com/merchant/orders#listagem-de-pedidos-abertos
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query=null){
        try
        {
            return $this->getClient()->get('orders/live', ($query==null?[]:$query->toArray()));
        }catch (\Exception $exception){
            throw $exception;
        }
    }

}