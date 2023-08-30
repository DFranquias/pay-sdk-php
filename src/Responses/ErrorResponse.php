<?php

namespace Dfranquias\Pay\Sdk\Responses;

/**
 * Resposta de erro genérica. Ocorre em todos os erros, diferindo apenas em código HTTP.
 * Erros de validação têm uma resposta diferente e dedicada.
 */
class ErrorResponse extends BaseResponse
{
    /**
     * ID do erro.
     *
     * @var string
     */
    public $id;

    /**
     * Título descritivo do problema.
     *
     * @var string
     */
    public $title;

    /**
     * Descrição detalhada do erro.
     *
     * @var string
     */
    public $detail;
}
