<?php
namespace Tonolucro\Delivery\Merchant\Http\Environment;

class Production implements EnvironmentInterface
{
    const ID = "production";
    const BASE_URI = 'https://api.tonolucro.com/v1/merchant/';

    /**
     * @return string
     */
    function getId()
    {
        return self::ID;
    }

    /**
     * @return string
     */
    function getApiUri()
    {
        return self::BASE_URI;
    }
}