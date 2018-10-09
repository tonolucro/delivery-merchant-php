<?php
namespace Tonolucro\Delivery\Merchant;

class Merchant
{
    /**
     * Merchant constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function info(){
        return json_encode(['success'=>true]);
    }
}