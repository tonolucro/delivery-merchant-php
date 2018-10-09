<?php
namespace Tonolucro\Delivery\Merchant;

use Tonolucro\Delivery\Merchant\Http\Auth;
use Tonolucro\Delivery\Merchant\Http\Client;
use Tonolucro\Delivery\Merchant\Http\Environment\EnvironmentInterface;
use Tonolucro\Delivery\Merchant\Http\Environment\Production;
use Tonolucro\Delivery\Merchant\Resource as Resource;

class Merchant
{
    /**
     * @var Auth
     */
    protected $auth;
    /**
     * @var EnvironmentInterface
     */
    protected $environment;

    /**
     * @var Client
     */
    protected $client = null;

    /**
     * Merchant constructor.
     * @param Auth $auth
     * @param EnvironmentInterface $environment
     * @return $this
     */
    public function __construct(Auth $auth, EnvironmentInterface $environment = null)
    {
        $this->auth = $auth;
        $this->environment = $environment==null?new Production():$environment;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(){
        if($this->client == null){
            $this->client = new Client($this->auth, $this->environment);
        }
        return $this->client;
    }

    /**
     * @return Resource\Merchant
     */
    public function getMerchantResource(){
        return new Resource\Merchant( $this->getClient() );
    }


}