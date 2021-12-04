<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PropertiesController extends Controller
{
    public function index(){
        $client = new Client([
            'base_uri' => 'https://api.stagingeb.com/v1/',
            'headers' => array(
                'X-Authorization' => env('API_KEY','9999999999'),
            )
        ]);
        // Send a request to https://api.stagingeb.com/
        $request = $client->request('GET', 'properties?page=1&limit=20');
        // Return data
        return response($request->getBody());        
    }
}
