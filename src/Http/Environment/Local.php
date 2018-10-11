<?php
namespace Tonolucro\Delivery\Merchant\Http\Environment;

class Local implements EnvironmentInterface
{
    const ID = "local";
    const BASE_URI = 'http://delivery.tonolucro.local/api/merchant/';

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