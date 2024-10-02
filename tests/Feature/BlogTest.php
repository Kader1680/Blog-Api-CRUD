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
    public function test_get_blogs(): void
    {
        $response = $this->json('GET', 'api/blog');
        $response->assertStatus(200); 
    }

    
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


    public function test_get_by_id_blog(){
        $response = $this->get('api/blog');

        $response->assertStatus(200);

        $idBlog = $response->json('data')[0]['id'];
        
        
        $update = $this->json('GET', 'api/blog/'.$idBlog);

        $update->assertStatus(200);
    
    }



    public function test_update_blog(){
        $response = $this->get('api/blog');

        $response->assertStatus(200);

        $idBlog = $response->json('data')[0]['id'];
        
        
        $update = $this->json('PUT', 'api/edit/'.$idBlog, [
            'title' => "e",
            'body' => 'wouw'
        ]);

        $update->assertStatus(200);
    
    }


    public function test_create_blog(){
        
        
        $newBlog = $this->json('POST', 'api/create/', [
            'title' => "new blog ",
            'body' => 'new body'
        ]);

        $newBlog->assertStatus(201);
    
    }

    public function test_delete_blog(){
        $response = $this->get('/api/blog');
        $idBlog = $response->json('data')[0]['id'];
        $newBlog = $this->json('DELETE', 'api/delete/'.$idBlog);
        $newBlog->assertStatus(204);
    
    }
}
