<?php
namespace App\Services;

use GuzzleHttp\Client;

class ApiClient
{
    protected $client;

    public function __construct()
    {
        // Configurar Guzzle HTTP Client
        $this->client = new Client([
            'base_uri' => 'http://127.0.0.1:7000', // URL base de la API
            'cookies' => true, // Habilitar envío de cookies
        ]);
    }

    public function login($email, $password)
    {
        try {
            // Realizar la solicitud POST
            $response = $this->client->post('/api/login', [
                'json' => [
                    'email' => $email,
                    'password' => $password,
                ]
            ]);

            // Obtener el cuerpo de la respuesta
            $body = $response->getBody();
            $data = json_decode($body);

            return $data; // Devolver la respuesta (puedes guardarlo en la sesión, etc.)
        } catch (\Exception $e) {
            // Manejar errores
            return ['error' => $e->getMessage()];
        }
    }
}
