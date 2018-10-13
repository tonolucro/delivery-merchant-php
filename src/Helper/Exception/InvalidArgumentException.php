<?php
namespace Tonolucro\Delivery\Merchant\Helper\Exception;

class InvalidArgumentException extends \Exception
{
    /**
     * InvalidArgumentException constructor.
     */
    public function __construct($message=null)
    {
        $this->code = "invalid_parameter";
        $this->message = empty($message)?"Parametros inválidos":$message;
    }
}