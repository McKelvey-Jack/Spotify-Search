<?php

namespace App\Services;
use GuzzleHttp\Client;

/**
 * Class SpotifyAPIService.
 */
class SpotifyAPIService
{
    public function __construct()
    {
        $this->client_id = config('app.client_id');
        $this->client_secret = config('app.client_secret');
    }

    public function fetchSpotifySearchData(string $search_string)
    
    {
        $credentials = base64_encode($this->client_id. ':' .$this->client_secret);
        $client = new Client();
        $res = $client->request('POST', "https://accounts.spotify.com/api/token", [
            'form_params' => 
            [
                'grant_type' => 'client_credentials'
            ],
            'headers' => 
            [
                'Authorization' => 'Basic '.$credentials
            ],
        ]);

        dd($res->getBody()->getContents());
    }
}