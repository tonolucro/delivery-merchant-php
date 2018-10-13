<?php
namespace Tonolucro\Delivery\Merchant\Http\Environment;

class Sandbox implements EnvironmentInterface
{
    const ID = "sandbox";
    const BASE_URI = 'https://api.sandbox.tonolucro.com/v1/merchant/';

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