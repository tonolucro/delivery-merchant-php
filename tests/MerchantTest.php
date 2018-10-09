<?php
namespace Tonolucro\Delivery\Merchant\Tests;

use PHPUnit\Framework\TestCase;
use Tonolucro\Delivery\Merchant\Merchant;

class MerchantTest extends TestCase
{
    public function testInfo(){
        $this->assertJson((new Merchant())->info());
    }
}