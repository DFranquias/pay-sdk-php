<?php

namespace Dfranquias\Pay\Sdk\Responses\Invoice;

use Dfranquias\Pay\Sdk\Dtos\Invoice;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

final class ListInvoicesResponse extends BaseResponse
{
    /**
     * Invoicees retornados.
     *
     * @var Invoice[]
     */
    public $data;
}
