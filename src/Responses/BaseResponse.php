<?php

namespace Dfranquias\Pay\Sdk\Responses;

use Psr\Http\Message\ResponseInterface;
use Spatie\DataTransferObject\FlexibleDataTransferObject;
use Spatie\DataTransferObject\ImmutableDataTransferObject;

/**
 * Classe que serve de base para todas as respostas da API.
 */
abstract class BaseResponse extends FlexibleDataTransferObject
{
    public const OK = 200;

    public const CREATED = 201;

    public const NO_CONTENT = 204;

    public const BAD_REQUEST = 400;

    public const UNAUTHORIZED = 401;

    public const FORBIDDEN = 403;

    public const NOT_FOUND = 404;

    public const VALIDATION_ERROR = 422;

    public const SERVER_ERROR = 500;

    public const SERVICE_UNAVAILABLE = 503;

    /**
     * Status HTTP da resposta.
     *
     * @var int
     */
    public $status;

    protected function __construct(array $parameters = [])
    {
        parent::__construct($parameters);
    }

    /**
     * Cria um objeto de resposta imutável a partir de uma resposta PSR-7 vinda do cliente HTTP Guzzle.
     *
     * @param ResponseInterface $response
     * @param int|null $status
     * @return ImmutableDataTransferObject
     */
    public static function create(ResponseInterface $response, ?int $status = null): ImmutableDataTransferObject
    {
        $data = json_decode($response->getBody()->getContents(), true);

        return static::immutable(array_merge($data, ['status' => $status ?? $response->getStatusCode()]));
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

    /**
     * Indica se houve erro de autenticação.
     *
     * @return bool
     */
    public function unauthenticated(): bool
    {
        return $this->status === static::UNAUTHORIZED;
    }

    /**
     * Indica se houve erro de autorização.
     *
     * @return bool
     */
    public function unauthorized(): bool
    {
        return $this->status === static::FORBIDDEN;
    }
}
