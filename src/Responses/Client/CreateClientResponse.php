<?php

namespace Dfranquias\Pay\Sdk\Responses\Client;

use Dfranquias\Pay\Sdk\Dtos\Client;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

class CreateClientResponse extends BaseResponse
{
    /**
     * Cliente que foi criado.
     * 
     * @var Client
     */
    public $client;
}