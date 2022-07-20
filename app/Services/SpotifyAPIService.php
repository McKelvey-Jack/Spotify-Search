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

    public function fetchSpotifySearchData(string $search_string, string $type, int $offset = 0)
    {
        $credentials = base64_encode($this->client_id. ':' .$this->client_secret);
        $client = new Client();
        $token = $this->fetchSpotifyAPIToken();
        $data = $client->request('GET', "https://api.spotify.com/v1/search", [
            'headers' => 
            [
                'Authorization' => 'Bearer '.$token
            ],
            'query' => [
                'q' => $search_string,
                'type' => $type,
                'offset' => $offset
            ]

        ])->getBody()->getContents();
        
        return ($data);
    }

    private function fetchSpotifyAPIToken() 
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
        ])->getBody()->getContents();
        $token = json_decode($res)->access_token;

        return $token;
    }
}