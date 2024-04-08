<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class productTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function status_code(): void
    {
        
        $response = $this->get('/blog');
        $response->assertStatus(200);
        
    }
}
