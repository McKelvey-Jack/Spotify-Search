<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
      /** @test */

    public function search_returns_data()
    {
        $response = $this->get('/search');
        $response->assertOk();
    }
}