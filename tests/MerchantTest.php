<?php
namespace Tonolucro\Delivery\Merchant\Tests;

use PHPUnit\Framework\TestCase;
use Tonolucro\Delivery\Merchant\Http\Auth;
use Tonolucro\Delivery\Merchant\Http\Environment\Sandbox;
use Tonolucro\Delivery\Merchant\Merchant;

class MerchantTest extends TestCase
{
    public function testInfo(){
        $resource = (new Merchant(new Auth(TesterConfig::getToken()), new Sandbox()))->getMerchantResource();

        $data = $resource->getInfo();

        print_r($data);

        $this->assertArrayHasKey('id', $data);
    }
}