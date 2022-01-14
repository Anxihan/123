<?php

namespace Laradocs\Moguding;

use Laradocs\Moguding\Exceptions\TokenExpiredException;
use GuzzleHttp\Client as Guzzle;

class Client
{
    protected string $baseUri = 'https://api.moguding.net:9000';

    protected function client() : Guzzle
    {
        $config = [
            'base_uri' => $this->baseUri,
        ];
        $factory = new Guzzle ( $config );

        return $factory;
    }

    public function login ( string $driver, string $phone, string $password ) : array
    {
        $response = $this->client()
            ->post ( 'session/user/v1/login', [
                'json' => [
                    'loginType' => $driver,
                    'phone' => $phone,
                    'password' => $password
                ],
            ] );

        return $this->body($response)[ 'data' ] ?? [];
    }

    protected function body ( string $response ) : array
    {
        $body = $response->getBody();
        try {
            $data = json_decode ( $body, true, 512, JSON_THROW_ON_ERROR );
        } catch ( TokenExpiredException ) {
            throw new TokenExpiredException();
        }

        return $data;
    }
}
