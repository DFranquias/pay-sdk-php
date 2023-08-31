<?php

namespace Dfranquias\Pay\Sdk\Dtos;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Invoice extends FlexibleDataTransferObject
{
    /**
     * ID do boleto.
     * 
     * @var string
     */
    public $id;

    /**
     * Valor do boleto.
     * 
     * @var float
     */
    public $valor;

    /**
     * Valor recebido, caso haja.
     * 
     * @var float|null
     */
    public $valor_recebido;

    /**
     * Valor total do boleto. Alias de valor.
     * 
     * @var float
     */
    public $valor_total;

    /**
     * Data de vencimento do boleto.
     * 
     * @var string
     */
    public $data_vencimento;

    /**
     * Data de liquidação, caso haja.
     * 
     * @var string|null
     */
    public $data_liquidacao;

    /**
     * Status do boleto.
     * 
     * @var int
     */
    public $status;

    /**
     * URL de download do boleto em PDF.
     * 
     * @var string
     */
    public $download_url;

    /**
     * Splits do boleto. Sempre presente. Caso não haja, vem vazio.
     * 
     * @var Split[]
     */
    public $splits;

    /**
     * Registros ativos do boleto. Sempre presente. Caso não haja, vem vazio.
     * 
     * @var Record[]
     */
    public $records_ativos;

    /**
     * ID de assinatura, caso haja.
     * 
     * @var string|null
     */
    public $subscription_id;

    /**
     * ID do carnê vinculado, caso haja.
     * 
     * @var string|null
     */
    public $booklet_id;

    /**
     * Valor de desconto, caso haja.
     * 
     * @var float|null
     */
    public $valor_desconto;

    /**
     * Data-limite do desconto, caso haja.
     * 
     * @var string|null
     */
    public $data_primeiro_desconto;
}