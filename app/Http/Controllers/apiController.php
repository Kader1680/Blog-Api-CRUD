<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function Laravel\Prompts\error;

/**
 * @OA\Get(
 *      path="/api/blog",
 *      operationId="getPosts",
 *      tags={"Posts"},
 *      summary="Get all posts",
 *      description="Returns a list of all posts.",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *              @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=5),
 *                  @OA\Property(property="title", type="string", example="thread"),
 *                  @OA\Property(property="body", type="string", example="thread"),
 *                  @OA\Property(property="published_at", type="string", example=null),
 *                  @OA\Property(property="created_at", type="string", example=null),
 *                  @OA\Property(property="updated_at", type="string", example="2024-04-08T20:39:27.000000Z")
 *              )
 *          )
 *         
 *      )
 *     
 * )
 * @OA\Post(
 *      path="/api/create",
 *      operationId="Post Blog",
 *      tags={"Posts"},
 *      summary="Post Blog",
 *      description="Returns blog Information with 201 status response code.",
 *      @OA\Response(
 *          response=201,
 *          description="Successful operation created",
 *              @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  @OA\Property(property="title", type="string", example="thread"),
 *                  @OA\Property(property="body", type="string", example="thread"),
 *              
 *              )
 *          )
 *         
 *      )
 *     
 * )
 */


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
            return Response::json(['status' => $status, 'error' => $error, 'data' => $data], 200);
           }else{
            $status = true;
            $error = null;
            $data = $post;
           }

            return Response::json(['status' => 200, 'error' => null, 'data' => $post], 200);


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
}
