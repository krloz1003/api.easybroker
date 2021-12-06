<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PropertiesController extends Controller
{
    private $params;

    public function index(Request $request){

        $this->params['query'] = $request->toArray();
        
        $client = new Client([
            'base_uri' => 'https://api.stagingeb.com/v1/',
            'headers' => array(
                'X-Authorization' => env('API_KEY','9999999999'),
            )
        ]);
        // Send a request to https://api.stagingeb.com/
        $res = $client->request('GET', 'properties', $this->params);
        
        // Return data
        return response($res->getBody());
    }
}
