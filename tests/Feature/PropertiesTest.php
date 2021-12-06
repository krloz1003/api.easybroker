<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controller\PropertiesController;
use Tests\TestCase;

class PropertiesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_paginate_page_5_limit_20()
    {
        $response = $this->get('/api/properties?page=5&limit=20');
        
        $response->assertStatus(200);
    }

    public function test_paginate_page_10_limit_20()
    {
        $response = $this->get('/api/properties?page=10&limit=20');
        
        $response->assertStatus(200);
    }

    public function test_paginate_page_100_limit_20()
    {
        $response = $this->get('/api/properties?page=100&limit=20');
        
        $response->assertStatus(200);
    }

    public function test_paginate_page_100000_limit_100()
    {
        $response = $this->get('/api/properties?page=100&limit=20');
        
        $response->assertStatus(200);
    }

}
