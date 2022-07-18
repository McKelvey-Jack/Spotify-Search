<?php

namespace Tests\Unit;

use Tests\TestCase;

class SearchTest extends TestCase
{
      /** @test */

    public function search_returns_data()
    {
        $response = $this->get(route('search', ['search_string' => 'Oasis']));
        $response->assertOk();
    }
}