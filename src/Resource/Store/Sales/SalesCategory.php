<?php
namespace Tonolucro\Delivery\Merchant\Resource\Store\Sales;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;
use Tonolucro\Delivery\Merchant\Resource\Resource;

class SalesCategory extends Resource
{
    const id = "id";
    const uid = "uid";
    const external_id = "external_id";
    const merchant_id = "merchant_id";
    const title = "title";
    const title_internal_order = "title_internal_order";
    const image = "image";
    const priority = "priority";
    const active = "active";

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-categorias
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-category
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

            return $this->getClient()->get('store/sales/categorys/'.$id);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/store-sales#listagem-de-categorias
     * Objeto[]: https://developers.tonolucro.com/merchant/objetos#merchant-store-sales-category
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query){
        try
        {
            return $this->getClient()->get('store/sales/categorys', $query->toArray());
        }catch (\Exception $exception){
            throw $exception;
        }
    }

}