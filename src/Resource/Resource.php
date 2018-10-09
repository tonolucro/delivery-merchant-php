<?php
namespace Tonolucro\Delivery\Merchant\Resource;

use Tonolucro\Delivery\Merchant\Http\Auth;
use Tonolucro\Delivery\Merchant\Http\Client;

abstract class Resource implements \JsonSerializable
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param Client $client
     * @return $this
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}