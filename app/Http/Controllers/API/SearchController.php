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

    public function searchSpotifyAPI(Request $request, string $search_string, SpotifyAPIService $SpotifyAPIService)
    {
        $data = $this->SpotifyAPIService->fetchSpotifySearchData($search_string);
    }
}