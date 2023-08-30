<?php

namespace Dfranquias\Pay\Sdk\Auth;

use Spatie\DataTransferObject\DataTransferObject;
use Dotenv\Dotenv;

/**
 * Objeto para autenticação junto à API.
 */
class Keys extends DataTransferObject
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

    /**
     * Cria um objeto de autenticação a partir das variáveis de ambiente.
     * 
     * @return \Spatie\DataTransferObject\ImmutableDataTransferObject
     */
    public static function fromEnvironment()
    {
       $env = static::loadEnvironment();

       return static::immutable([
            'publicKey' => $env['DF_PAY_PUBLIC_KEY'],
            'secretKey' => $env['DF_PAY_SECRET_KEY'],
       ]);
    }

    /**
     * Carrega as variáveis de ambiente.
     */
    private static function loadEnvironment()
    {
        $envPath = __DIR__ . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
        
        $env = Dotenv::createImmutable($envPath);

        $env->required(['DF_PAY_PUBLIC_KEY', 'DF_PAY_SECRET_KEY']);

        return $env->load();
    }
}