<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Route;

class BlogPostController extends Controller
{
    function postblog(){
        return view("create");
    }

    function allBlog(){
        $posts = Post::all();
        return view("allBlog", [
            "posts"=> $posts
        ]);

    }

    function CreateBlog(Request $request){
        $title = $request->input("title");
        $body = $request->input("body");


        $isInserSucess = Post::insert([
            'title'=>$title,
            'body'=>$body,


    ]);

    if ($isInserSucess) {
        return view("sucessBlog");
    } else {
        echo "false sueces";
    }

    }
    function ediBlog(Post $post){
        return view("editBlog", [
            'post'=>  ($post)

        ]);
    }

    function updateBlog(Request $request, $id){


        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();

        return redirect(route("allBlog"));






    }

    function deleteBlog($id){
        $post = Post::find($id);

        $post->delete();

        return redirect(route("allBlog"));


    }
    function deleteAll(){

        Post::truncate();

        return redirect(route("allBlog"));



    }
}

