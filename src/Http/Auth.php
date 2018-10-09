<?php
namespace Tonolucro\Delivery\Merchant\Http;

class Auth
{
    /**
     * @var string
     */
    protected $token;
    /**
     * @var string
     */
    protected $username = null;
    /**
     * @var string
     */
    protected $password = null;

    /**
     * Auth constructor.
     * @param string $token
     * @return $this
     * @throws \Exception
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->translate();
        return $this;
    }

    /**
     * @throws \Exception
     */
    protected function translate()
    {
        list($this->username, $this->password) = explode(":", base64_decode( $this->getToken() ));

        if( is_null($this->username) || is_null($this->password) ){
            throw new \Exception("Token inválido");
        }
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

}