<?php

namespace Dfranquias\Pay\Sdk\Dtos;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Client extends FlexibleDataTransferObject
{
    /**
     * ID do cliente.
     * 
     * @var string
     */
    public $id;

    /**
     * Nome do cliente.
     * 
     * @var string
     */
    public $nome;

    /**
     * Razão social, caso haja.
     * 
     * @var string|null
     */
    public $razao_social;

    /**
     * CNPJ, caso haja.
     * 
     * @var string|null
     */
    public $cnpj;
}