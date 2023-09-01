<?php

namespace Dfranquias\Pay\Sdk\Responses;

/**
 * Resposta de erro de validação.
 */
final class ValidationErrorResponse extends BaseResponse
{
    /**
     * Mensagem de erro com o sumário dos problemas de validação.
     *
     * @var string
     */
    public $message;

    /**
     * Array contendo os erros de validação detalhados.
     *
     * @var array
     */
    public $errors;
}
