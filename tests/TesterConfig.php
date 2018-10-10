<?php
namespace Tonolucro\Delivery\Merchant\Tests;

class TesterConfig
{
    public static function getToken(){
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        return getenv('TOKEN');
    }
}