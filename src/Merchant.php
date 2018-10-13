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

    /**
     * @return Resource\Store\Inventory\ProductGroup
     */
    public function getProductGroupResource(){
        return new Resource\Store\Inventory\ProductGroup( $this->getClient() );
    }

    /**
     * @return Resource\Store\Inventory\Product
     */
    public function getProductResource(){
        return new Resource\Store\Inventory\Product( $this->getClient() );
    }

    /**
     * @return Resource\Store\Sales\SalesCategory
     */
    public function getSalesCategoryResource(){
        return new Resource\Store\Sales\SalesCategory( $this->getClient() );
    }

    /**
     * @return Resource\Store\Sales\SalesPricing
     */
    public function getSalesPricingResource(){
        return new Resource\Store\Sales\SalesPricing( $this->getClient() );
    }

    /**
     * @return Resource\Store\Sales\SalesProduct
     */
    public function getSalesProductResource(){
        return new Resource\Store\Sales\SalesProduct( $this->getClient() );
    }

    /**
     * @return Resource\ExternalID
     */
    public function getExternalIDResource(){
        return new Resource\ExternalID( $this->getClient() );
    }

    /**
     * @return Resource\Order
     */
    public function getOrderResource(){
        return new Resource\Order( $this->getClient() );
    }

    /**
     * @return Resource\Order\Live
     */
    public function getOrderLiveResource(){
        return new Resource\Order\Live( $this->getClient() );
    }

    /**
     * @return Resource\Order\Workflow
     */
    public function getOrderWorkflowResource(){
        return new Resource\Order\Workflow( $this->getClient() );
    }

}