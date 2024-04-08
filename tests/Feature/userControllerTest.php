<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_structre_resposnse(): void
    {
        // Make a GET request to the /api/users endpoint
        $response = $this->getJson('http://127.0.0.1:8000/api/blog');

        // Assert that the response status is 200 OK
        $response->assertStatus(200);
    }

    public function test_post_response(): void{
        $dataPost = [
            'title' => 'abdelkader',
            'body' => 'good programmer',
        ];
        $response = $this->postJson('http://127.0.0.1:8000/api/create', $dataPost);
        // Assert that the response status is 200 OK
        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', [
            'title' => 'abdelkader',
            'body' => 'good programmer',
        ]);
    }

    public function test_can_update_user()
    {
        $post = Post::factory()->create();
        $response = $this->putJson('http://127.0.0.1:8000/api/edit/' . $post->id, [
            'title' => 'amine',
            'body' => 'writer',
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'amine',
        ]);
    }

    public function test_index(): void{
        // Create a dummy post
        $post = Post::factory()->create();
        // Make a GET request to the /api/posts/{id} endpoint to show the post
        $response = $this->getJson('http://127.0.0.1:8000/api/blog/'. $post->id);
        // Assert that the response status is 200 OK
        $response->assertStatus(200);
    }

    public function test_can_delete_post()
    {
        // Create a dummy post
        $post = Post::factory()->create();

        // Make a DELETE request to the /api/posts/{id} endpoint to delete the post
        $response = $this->deleteJson('/api/delete/' . $post->id);

        // Assert that the response status is 204 No Content (indicating success)
        $response->assertStatus(204);

        // Assert that the post was deleted from the database
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_delete_nonexistent_post()
    {
        // Attempt to delete a post with an invalid ID
        $response = $this->deleteJson('/api/posts/999');

        // Assert that the response status is 404 Not Found
        $response->assertStatus(404);

        // Assert that the response contains the appropriate error message
        $response->assertJson([
            'error' => 'Post not found'
        ]);
    }


    
}

