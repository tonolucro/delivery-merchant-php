<?php
namespace Tonolucro\Delivery\Merchant\Resource;

class Merchant extends Resource
{
    /**
     * @return string
     * @throws \Exception
     */
    public function info(){

        try {
            $data = $this->getClient()->get('info');

            return $data;
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}