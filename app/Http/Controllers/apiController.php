<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function Laravel\Prompts\error;

class apiController extends Controller
{
    public function index($id){
        $post = Post::find($id);
       if (!$post) {
        $status = false;
        $error = 'error';
        $data = 'not found';
        return Response::json(['status' => $status, 'error' => $error, 'data' => $data]);
       }else{
        $status = true;
        $error = null;
        $data = $post;
       }
        return Response::json(['status' => 'true', 'error' => null, 'data' => $post]);
    }
    public function show(){
        $post = Post::all();
        if (!$post) {
            $status = false;
            $error = 'error';
            $data = 'not found';
            return Response::json(['status' => $status, 'error' => $error, 'data' => $data]);
           }else{
            $status = true;
            $error = null;
            $data = $post;
           }

            return Response::json(['error' => null, 'data' => $post], 200);

        // return $posts;
    }
    public function edit(Request $request, $paramter){
        $post = Post::find($paramter);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();


        return Response::json(['status' => 200, 'error' => null, 'data' => $post], 200);
    }
    public function create(Request $request){
        $title = $request->input("title");
        $body = $request->input("body");

        $isInserSucess = Post::insert([
            'title'=>$title,
            'body'=>$body,
        ]);

        return Response::json(['status' => 201, 'error' => null, 'data' => $request->all()], 201);
    }
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return Response::json(['status' => 204, 'error' => null, 'data' => $post], 204);
        ;
    }



    // public function showClient(){
    //     $clients = Clients::all();
    //     if (!$clients) {
    //         $status = false;
    //         $error = 'error';
    //         $data = 'not found';
    //         return Response::json(['status' => $status, 'error' => $error, 'data' => $data]);

    //        }else{
    //         $status = true;
    //         $error = null;
    //         $data = $clients;
    //        }
    //         return Response::json(['status' => 200, 'error' => [], 'data' => $clients]);
    // }


    // public function addClient(Request $request){

    // $client = new Client();
    // $client->name = $request->input('name');
    // $client->email = $request->input('email');
    // $client->age = $request->input('age');
    // $client->message = $request->input('message');
    // $client->save();

    // }




}
