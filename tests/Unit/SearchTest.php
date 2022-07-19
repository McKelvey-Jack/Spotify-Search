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
    public function search_brings_back_selected_type()
    {
        $params = ['search_string' => 'Shake', 'type' => 'track'];
        $response = $this->get(route('search', $params));
        $response->assertJsonStructure(['tracks']);
    }
    /** @test */
    public function search_works_with_no_offset()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist'];
        $response = $this->get(route('search', $params));
        $response->assertJsonPath('artists.offset', 0);
    }
    
    /** @test */
    public function search_brings_back_correct_offset_data()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'artist', 'offset' => 10];
        $response = $this->get(route('search', $params , ['params' => ['test' => 'test']]));
        $response->assertJsonPath('artists.offset', 10);
    }

    /** @test */
    public function search_catches_validation_errors()
    {
        $params = ['search_string' => 'Oasis', 'type' => 'test', 'offset' => 'test'];
        $response = $this->get(route('search', $params , ['params' => ['test' => 'test']]));
        $response->assertSessionHasErrors(['type', 'offset']);
    }
    
}