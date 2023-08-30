<?php

namespace Dfranquias\Pay\Sdk\Responses;

use Psr\Http\Message\ResponseInterface;
use Spatie\DataTransferObject\FlexibleDataTransferObject;
use Spatie\DataTransferObject\ImmutableDataTransferObject;

/**
 * Classe que serve de base para todas as respostas da API.
 */
class BaseResponse extends FlexibleDataTransferObject
{
    public const OK = 200;

    public const NO_CONTENT = 204;

    public const BAD_REQUEST = 400;

    public const VALIDATION_ERROR = 422;

    public const SERVER_ERROR = 500;

    /**
     * Status HTTP da resposta.
     *
     * @var int
     */
    public $status;

    /**
     * Cria um objeto de resposta imutável a partir de uma resposta PSR-7 vinda do cliente HTTP Guzzle.
     *
     * @param ResponseInterface $response
     * @param int $status
     * @return ImmutableDataTransferObject
     */
    public static function fromPsrResponse(ResponseInterface $response, int $status): ImmutableDataTransferObject
    {
        $data = json_decode($response->getBody()->getContents(), true);

        return static::immutable(array_merge($data, ['status' => $status]));
    }
}
