<?php

namespace Dfranquias\Pay\Sdk\Auth;

use Spatie\DataTransferObject\DataTransferObject;
use Dotenv\Dotenv;

/**
 * Objeto para autenticação junto à API.
 */
final class Keys extends DataTransferObject
{
    /**
     * Chave pública para acesso à API.
     *
     * @var string
     */
    public $publicKey;

    /**
     * Chave secreta para acesso à API.
     *
     * @var string
     */
    public $secretKey;

    protected function __construct(array $parameters = [])
    {
        parent::__construct($parameters);
    }

    public static function create(array $parameters = [])
    {
        return static::immutable($parameters);
    }

    /**
     * Cria um objeto de autenticação a partir das variáveis de ambiente.
     *
     * @return \Spatie\DataTransferObject\ImmutableDataTransferObject
     */
    public static function fromEnvironment()
    {
        $env = static::loadEnvironment();

        return static::create([
            'publicKey' => $env['DF_PAY_PUBLIC_KEY'],
            'secretKey' => $env['DF_PAY_SECRET_KEY'],
       ]);
    }

    /**
     * Carrega as variáveis de ambiente.
     *
     * @throws \Dotenv\Exception\ValidationException Caso as chaves não estejam ambas presentes nas variáveis de ambiente.
     * @return array<string, string|null>
     */
    protected static function loadEnvironment()
    {
        $env = Dotenv::createImmutable(getcwd());

        $variables = $env->load();

        $env->required(['DF_PAY_PUBLIC_KEY', 'DF_PAY_SECRET_KEY']);

        return $variables;
    }
}
