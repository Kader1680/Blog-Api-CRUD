<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_get_blogs(): void
    // {
    //     $response = $this->json('GET', 'api/blog');
    //     $response->assertStatus(200); 
    // }

    
    // public function test_create_blog(){

    //     $data = [
    //         'title' => 'lorem',
    //         'body' => 'lorem for the wiouw',
    //     ];
    //     $response = $this->json('POST','api/create', $data);
    //     $response->assertStatus(201);
    //     $this->assertDatabaseHas('posts',  [
    //         'title' => 'second wioou',
    //         'body' => 'is any content for the wiiou',
    //     ]);
    // }


    public function test_update_blog(){
        $response = $this->get('api/blog');

        $response->assertStatus(200);

        $blogs = $response->json();
        dd($blogs[1]);
    }
    
}
