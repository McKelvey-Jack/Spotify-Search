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

    public function searchSpotifyAPI(Request $request, SpotifyAPIService $SpotifyAPIService, string $search_string, string $type, int $offset = 0)
    {
        $data = $this->SpotifyAPIService->fetchSpotifySearchData($search_string, $type, $offset);

        return response($data, 200);
    }
}