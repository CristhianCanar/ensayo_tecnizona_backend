<?php

namespace App\Http\Controllers;

use App\Api\EstructuraApi;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $estructuraApi;
    public $token_acceso_mps;
    public $client;

    public function __construct()
    {
        $this->estructuraApi = new EstructuraApi();

        $client_token = new Client();

        $respuesta = $client_token->request('POST', 'https://shopcommerce.mps.com.co:7071/Token', [
            'form_params' => [
                'grant_type' => 'password',
                'username' => 'pruebas@stac.com.co',
                'password' => 'Hka2cTyLIR'
            ]
        ]);
        $autorizacion = json_decode($respuesta->getBody(), true);

        $this->token_acceso_mps = $autorizacion["access_token"];

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://shopcommerce.mps.com.co:7071/',
            // You can set any number of default request options.
            'timeout'  => 15,
        ]);

    }

}
