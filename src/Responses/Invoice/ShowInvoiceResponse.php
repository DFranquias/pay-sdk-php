<?php

namespace Dfranquias\Pay\Sdk\Responses\Invoice;

use Dfranquias\Pay\Sdk\Dtos\Invoice;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

final class ShowInvoiceResponse extends BaseResponse
{
    /**
     * Boleto retornado pela API.
     *
     * @var Invoice
     */
    public $invoice;
}
