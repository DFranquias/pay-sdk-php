<?php

namespace Dfranquias\Pay\Sdk;

/**
 * Classe de utilidade que representa opções possíveis de serem configuradas no cliente que se comunica à API.
 */
final class ClientOptions
{
    public const ENVIRONMENT = 'environment';

    public const PRODUCTION_URL = 'https://api.dfranquiaspay.com.br';

    public const SANDBOX_URL = 'https://apistaging.dconta.com.br';

    public const ENVIRONMENT_PRODUCTION = 'production';
}
