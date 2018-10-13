<?php
namespace Tonolucro\Delivery\Merchant\Resource\Store\Sales;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;
use Tonolucro\Delivery\Merchant\Resource\Resource;

class SalesPricing extends Resource
{
    const id = "id";
    const uid = "uid";
    const external_id = "external_id";
    const title = "title";
    const code = "code";
    const alert = "alert";

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-regras
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-pricing
     *
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function get($id){
        try
        {
            if( !Validator::isID($id) ){
                throw new InvalidArgumentException();
            }

            return $this->getClient()->get('store/sales/pricings/'.$id);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-regras
     * Objeto[]: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-pricing
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query){
        try
        {
            return $this->getClient()->get('store/sales/pricings', $query->toArray());
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}