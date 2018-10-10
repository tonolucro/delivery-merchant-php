# SDK //API Tonolucro Merchant
Biblioteca PHP de integração com a //API Tonolucro Merchant

## Dependências

* PHP >= 5.6

## Instalando o SDK

Se já possui um arquivo `composer.json`, basta adicionar a seguinte dependência ao seu projeto:

```json
"require": {
    "tonolucro/delivery-merchant-v1-php": "*"
}
```

Com a dependência adicionada ao `composer.json`, basta executar:

```
composer install
```

Alternativamente, você pode executar diretamente em seu terminal:

```
composer require tonolucro/delivery-merchant-v1-php
```

## Documentação da API

Documentação completa da API está disponível no link [https://developers.tonolucro.com/](https://developers.tonolucro.com/)

## Utilizando o SDK

Para consumir os recursos da API com o SDK, basta fazer:

### Informações do estabelecimento do usuário autenticado

```
GET ​https://api.[sandbox.]tonolucro.com/v1/merchant/​info
```

````php
<?php
require_once 'vendor/autoload.php';

use \Tonolucro\Delivery\Merchant\Http\Auth;
use \Tonolucro\Delivery\Merchant\Merchant;
use \Tonolucro\Delivery\Merchant\Http\Environment;

try{

    /**
     * Factory dos recursos da API
     */
    $manager = new Merchant(
        new Auth(
            'XXX' //Ver https://developers.tonolucro.com/merchant/autenticacao
        ),
        new Environment\Sandbox() //new Environment\Production()
    );

    /**
     * Instância do recurso /Merchant
     */
    $resource = $manager->getMerchantResource();

    /**
     * Método: https://developers.tonolucro.com/merchant/merchant#informacoes
     */
    $data = $resource->getInfo();

    /**
     * Navegue no array de informações
     */
    print_r($data);

}catch (Exception $ex){
    die($ex->getMessage());
}
````