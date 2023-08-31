<?php

namespace Dfranquias\Pay\Sdk\Responses\Invoice;

use Dfranquias\Pay\Sdk\Dtos\Invoice;
use Dfranquias\Pay\Sdk\Responses\BaseResponse;

class CreateInvoiceResponse extends BaseResponse
{
    /**
     * String que indica o tipo de operação.
     * 
     * @var string
     */
    public $tipo_operacao;

    /**
     * Data de conclusão da operação.
     * 
     * @var string
     */
    public $concluido_em;

    /**
     * Array contendo as cobranças criadas. Máximo de 10.
     * 
     * @var Invoice[]
     */
    public $cobrancas;
}