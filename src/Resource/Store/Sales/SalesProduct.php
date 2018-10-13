<?php
namespace Tonolucro\Delivery\Merchant\Resource\Store\Sales;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;
use Tonolucro\Delivery\Merchant\Resource\Resource;

class SalesProduct extends Resource
{
    const id = "id";
    const uid = "uid";
    const external_id = "external_id";
    const merchant_id = "merchant_id";
    const product_group_id = "product_group_id";
    const title = "title";
    const title_internal_order = "title_internal_order";
    const image = "image";
    const amount = "amount";
    const amount_discount = "amount_discount";
    const amount_sale = "amount_sale";
    const priority = "priority";
    const active = "active";

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-anuncios-produtos
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-product
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

            return $this->getClient()->get('store/sales/products/'.$id);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-anuncios-produtos
     * Objeto[]: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-product
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query){
        try
        {
            return $this->getClient()->get('store/sales/products', $query->toArray());
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/store-inventory#listagem-de-grupos
     *
     * @param int $id
     * @param bool $active
     * @return bool
     * @throws \Exception
     */
    public function active($id, $active){
        try
        {
            if( !Validator::isID($id) || !Validator::isBool($active) ){
                throw new InvalidArgumentException();
            }

            $result = $this->getClient()->put('store/sales/products/'.$id, ['active'=>(bool)$active]);

            return $result['success'];

        }catch (\Exception $exception){
            throw $exception;
        }
    }
}