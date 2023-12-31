<?php

namespace Dfranquias\Pay\Sdk\Responses\Client;

use Dfranquias\Pay\Sdk\Dtos\Client;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

final class ListClientsResponse extends BaseResponse
{
    /**
     * Clientes retornados.
     *
     * @var Client[]
     */
    public $data;
}
