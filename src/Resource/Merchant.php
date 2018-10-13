<?php
namespace Tonolucro\Delivery\Merchant\Resource;

use Tonolucro\Delivery\Merchant\Helper\Exception\InvalidArgumentException;
use Tonolucro\Delivery\Merchant\Helper\Validator;

class Merchant extends Resource
{
    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#informacoes
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant
     *
     * @return array
     * @throws \Exception
     */
    public function getInfo(){
        try
        {
            return $this->getClient()->get('info');
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#funcionamento
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant-operation
     *
     * @return array
     * @throws \Exception
     */
    public function getOperation(){
        try
        {
            return $this->getClient()->get('operation');
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#abrir-ou-fechar
     * Objeto: https://developers.tonolucro.com/merchant/objetos#merchant-operation
     *
     * @param bool $open
     * @param int $minutes
     * @return array
     * @throws \Exception
     */
    public function updateOperation($open, $minutes=0){
        try
        {
            if( !Validator::isBool($open) || !Validator::isInteger($minutes) ){
                throw new InvalidArgumentException();
            }

            return $this->getClient()->put('operation', [
                'open' => (bool) $open,
                'minutes' => $minutes
            ]);
        }catch (\Exception $exception){
            throw $exception;
        }
    }


}