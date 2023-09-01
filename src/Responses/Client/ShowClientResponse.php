<?php

namespace Dfranquias\Pay\Sdk\Responses\Client;

use Dfranquias\Pay\Sdk\Dtos\Client;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

final class ShowClientResponse extends BaseResponse
{
    /**
     * Cliente retornado pela API.
     *
     * @var Client
     */
    public $client;
}
