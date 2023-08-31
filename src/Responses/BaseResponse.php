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

    public const CREATED = 201;

    public const NO_CONTENT = 204;

    public const BAD_REQUEST = 400;

    public const NOT_FOUND = 404;

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

    /**
     * Indica se a resposta foi de sucesso.
     * 
     * @return bool
     */
    public function successful(): bool
    {
        return in_array($this->status, [static::OK, static::CREATED, static::NO_CONTENT]);
    }

    /**
     * Indica se a resposta foi de erro.
     * 
     * @return bool
     */
    public function failed(): bool
    {
        return !$this->successful();
    }
}
