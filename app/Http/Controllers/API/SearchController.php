<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SpotifyAPIService;

class SearchController extends Controller
{
    protected SpotifyAPIService $SpotifyAPIService;

    public function __construct(SpotifyAPIService $SpotifyAPIService) 
    {
        $this->SpotifyAPIService = $SpotifyAPIService;
    }

    public function searchSpotifyAPI(Request $request, SpotifyAPIService $SpotifyAPIService, string $search_string)
    {
        $validated = $request->validate([
            'type' => 'required|in:artist,album,track,playlist',
            'offset' => 'numeric',
        ]);

        try {
            $offset = $request->get('offset') ?: 0;
            $type = $request['type'];
            $data = $this->SpotifyAPIService->fetchSpotifySearchData($search_string, $type, $offset);
            return response($data, 200);
        } catch(\Exception $e) {
            $response = $e->getResponse();
            $code = $e->getCode();
            $responseBody = $response->getBody()->getContents();
            return response($responseBody, $code);
        }
    }
}