<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class apiController extends Controller
{
    public function index($id){
        $post = Post::find($id);

        return $post;
    }

    public function show(){
        $posts = Post::all();
        return $posts;
    }


    public function edit(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();


        return $post;
    }
    public function create(Request $request){
        $title = $request->input("title");
        $body = $request->input("body");


        $isInserSucess = Post::insert([
            'title'=>$title,
            'body'=>$body,



// if ($isInserSucess) {
//     return response()->json('')
// }

    ]);
    return Response::json(['message' => 'created'], 201);

    }




}
