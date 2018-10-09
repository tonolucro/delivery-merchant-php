<?php
namespace Tonolucro\Delivery\Merchant\Tests;

use PHPUnit\Framework\TestCase;
use Tonolucro\Delivery\Merchant\Http\Auth;
use Tonolucro\Delivery\Merchant\Http\Environment\Sandbox;
use Tonolucro\Delivery\Merchant\Merchant;

class MerchantTest extends TestCase
{
    public function testInfo(){
        $resource = (new Merchant(new Auth(""), new Sandbox()))->getMerchantResource();

        $data = $resource->info();

        print_r($data);

        $this->assertArrayHasKey('id', $data);
    }
}