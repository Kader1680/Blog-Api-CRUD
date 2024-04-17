<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Post;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_create_response(): void
    {
        $villa = Post::create([
            'size' => 2160,
            // Add other properties as needed
        ]);

        
        // When
        $retrievedVilla = Post::find($villa->id);

        // Then
        $this->assertEquals($villa->size, $retrievedVilla->size);
    }
}
