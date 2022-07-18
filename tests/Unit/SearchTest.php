<?php

namespace Tests\Unit;
use Illuminate\Testing\Fluent\AssertableJson;

use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */

    
    public function valid_search_returns_200()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist'];
        $response = $this->get(route('search', $params));
        $response->assertStatus(200);
    }

     /** @test */

    public function valid_search_returns_data()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist'];
        $response = $this->get(route('search', $params));
        $response->assertJsonPath('artists.items', fn ($item) => count($item) > 0);
    
    }
    /** @test */

    public function search_works_with_no_offset()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist'];
        $response = $this->get(route('search', $params));
        $response->assertJsonPath('artists.offset', 0);
    }
    
    /** @test */
    
    public function search_works_brings_back_correct_offset_data()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist', 'offset' => 10];
        $response = $this->get(route('search', $params , ['params' => ['test' => 'test']]));
        $response->assertJsonPath('artists.offset', 10);
    }
}