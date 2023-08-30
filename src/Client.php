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
    public function __construct(array $options = [ClientOptions::ENVIRONMENT => DF_PAY_ENV_PRODUCTION])
    {
        $keys = Keys::fromEnvironment();

        parent::__construct([
            'base_uri' => $options[ClientOptions::ENVIRONMENT] !== DF_PAY_ENV_PRODUCTION ? 
                DF_PAY_BASE_URI_SANDBOX : DF_PAY_BASE_URI_PRODUCTION,
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