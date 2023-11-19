<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogPostController extends Controller
{
    function postblog(){
        return view("create");
    }

    function CreateBlog(Request $request){
        $title = $request->input("title");
        $body = $request->input("body");


        $isInserSucess = Post::insert([
            'title'=>$title,
            'body'=>$body,


    ]);

    if ($isInserSucess) {
        echo "true sucess";
    } else {
        echo "false sueces";
    }

    }
}
