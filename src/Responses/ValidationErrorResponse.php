<?php

namespace Dfranquias\Pay\Sdk\Responses;

use Psr\Http\Message\ResponseInterface;
use Spatie\DataTransferObject\ImmutableDataTransferObject;

/**
 * Resposta de erro de validação.
 */
class ValidationErrorResponse extends BaseResponse
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

    public static function fromPsrResponse(ResponseInterface $response, int $status): ImmutableDataTransferObject
    {
        return parent::fromPsrResponse($response, static::VALIDATION_ERROR);
    }
}
