<?php
namespace Tonolucro\Delivery\Merchant\Resource\Store\Inventory;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;
use Tonolucro\Delivery\Merchant\Resource\Resource;

class ProductGroup extends Resource
{
    const id = "id";
    const uid = "uid";
    const external_id = "external_id";
    const merchant_id = "merchant_id";
    const title = "title";
    const title_product_choice = "title_product_choice";
    const editable = "editable";
    const priority = "priority";
    const active = "active";

    /**
     * Método: https://developers.tonolucro.com/merchant/store-inventory#listagem-de-grupos
     * Objeto: https://developers.tonolucro.com/merchant/objetos#store-inventory-products-group
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

            return $this->getClient()->get('store/inventory/product/groups/'.$id);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/store-inventory#listagem-de-grupos
     * Objeto[]: https://developers.tonolucro.com/merchant/objetos#store-inventory-products-group
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query){
        try
        {
            return $this->getClient()->get('store/inventory/product/groups', $query->toArray());
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}