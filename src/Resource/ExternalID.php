<?php
namespace Tonolucro\Delivery\Merchant\Resource;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;
use Tonolucro\Delivery\Merchant\Http\Query;

class ExternalID extends Resource
{
    const id = "id";
    const uid = "uid";
    const content = "content";
    const created_at = "created_at";
    const updated_at = "updated_at";

    /**
     * Método: https://developers.tonolucro.com/merchant/externalid#informacoes-de-um-externalid
     * Objeto: https://developers.tonolucro.com/merchant/objetos#externalid
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

            return $this->getClient()->get('externalid/'.$uid);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/externalid#listagem-de-externalids-cadastrados
     *
     * @param Query $query
     * @return array
     * @throws \Exception
     */
    public function search(Query $query){
        try
        {
            return $this->getClient()->get('externalid', $query->toArray());
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/externalid#atualizar-ou-criar-um-externalid
     *
     * @param string $uid
     * @param string $value
     * @return bool
     * @throws \Exception
     */
    public function update($uid, $value){
        try
        {
            if( !Validator::isUID($uid) ){
                throw new InvalidArgumentException();
            }

            $result = $this->getClient()->put('externalid/'.$uid, ['content'=>$value]);

            return $result['success'];

        }catch (\Exception $exception){
            throw $exception;
        }
    }
}