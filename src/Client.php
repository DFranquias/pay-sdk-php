<?php

namespace Dfranquias\Pay\Sdk;

use Dfranquias\Pay\Sdk\Auth\Keys;
use GuzzleHttp\Client as BaseClient;
use GuzzleHttp\RequestOptions;

/**
 * Cliente responsável pela configuração da comunicação à API DFranquias Pay.
 */
class Client extends BaseClient
{
    public function __construct(array $options, Keys $keys = null)
    {
        // Carrega as chaves do ambiente caso nenhum objeto de autenticação seja fornecido.
        if (!$keys) {
            $keys = Keys::fromEnvironment();
        }

        parent::__construct([
            'base_uri' => $options[ClientOptions::ENVIRONMENT] !== ClientOptions::ENVIRONMENT_PRODUCTION ?
                ClientOptions::PRODUCTION_URL : ClientOptions::SANDBOX_URL,
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-DFPay-Public-Key' => $keys->publicKey,
                'X-DFPay-Secret-Key' => $keys->secretKey,
            ],
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::ALLOW_REDIRECTS => [
                'strict' => true,
                'protocols' => ['https'],
            ],
        ]);
    }
}
