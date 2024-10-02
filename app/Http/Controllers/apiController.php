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
 *      tags={"Blogs"},
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
 * 

 *  @OA\Post(
 *      path="/api/create",
 *      operationId="Post Blog",
 *      tags={"Blogs"},
 *      summary="Post Blog",
 *      description="Returns blog Information with 201 status response code.",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"title", "body"},
 *              @OA\Property(property="title", type="string", example="Title of your BLog"),
 *              @OA\Property(property="body", type="string", example="Body of your Blog")
 *          ),
 *      ),
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
 * 
 * @OA\Get(
 *      path="/api/blog/{id}",
 *      operationId="getYourModelById",
 *      tags={"Blogs"},
 *      summary="Get a specific your Blog by ID",
 *      description="Get blog by Id",
 *      @OA\Parameter(
 *          name="id",
 *          description="ID of your Blog",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer",
 *              format="int64"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful Get Blog By Id",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="true"),
 *              @OA\Property(property="error", type="string", nullable=true),
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="integer", example=5),
 *                  @OA\Property(property="title", type="string", example="thread"),
 *                  @OA\Property(property="body", type="string", example="thread"),
 *                  @OA\Property(property="published_at", type="string", nullable=true),
 *                  @OA\Property(property="created_at", type="string", nullable=true),
 *                  @OA\Property(property="updated_at", type="string", format="date-time"),
 *              ),
 *          ),
 *      ),
 * )
 * @OA\Delete(
 *      path="/api/delete/{id}",
 *      operationId="Get Model By Id",
 *      tags={"Blogs"},
 *      summary="Delete Blog by ID",
 *      description="Get blog by Id",
 *      @OA\Parameter(
 *          name="id",
 *          description="ID of your Blog",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *        
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Delete the blog with Id Sussecfly",
 *      ),
 * )

 * @OA\Put(
 *      path="api/edit/{id}",
 *      operationId="update the blog by id",
 *      tags={"Blogs"},
 *      summary="Update a your Blog",
 *      description="Update a your Blog by its ID",
 *      @OA\Parameter(
 *          name="id",
 *          description="ID of your Blog",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"title", "body"},
 *              @OA\Property(property="id", type="integer", example=7),
 *              @OA\Property(property="title", type="string", example="Abdelkader"),
 *              @OA\Property(property="body", type="string", example="Ouldn Hennia"),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *        @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="true"),
 *              @OA\Property(property="error", type="string", nullable=true),
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="integer", example=5),
 *                  @OA\Property(property="title", type="string", example="thread"),
 *                  @OA\Property(property="body", type="string", example="thread"),
 *                  @OA\Property(property="published_at", type="string", nullable=true),
 *                  @OA\Property(property="created_at", type="string", nullable=true),
 *                  @OA\Property(property="updated_at", type="string", format="date-time"),
 *              ),
 *          ),
 *         
 *      )
 * )

 */
class apiController extends Controller
{
    public function index($id)
    {
        $post = Post::find($id);
        if (!$post) {
            $status = false;
            $error = 'error';
            $data = 'not found';
            return Response::json(['status' => $status, 'error' => $error, 'data' => $data]);
        } else {
            $status = true;
            $error = null;
            $data = $post;
        }
        return Response::json(['status' => 'true', 'error' => null, 'data' => $post]);
    }
    public function show()
    {
        $post = Post::all();
        if (!$post) {
            $status = false;
            $error = 'error';
            $data = 'Ops not found blogs';
            return Response::json(['status' => $status, 'error' => $error, 'message' => $data], 404);
        }

        return Response::json(['status' => 200, 'error' => null, 'data' => $post], 200);
 
    }
    public function edit(Request $request, $paramter)
    {
        $post = Post::find($paramter);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->update();


        return Response::json(['status' => 200, 'error' => null, 'data' => $post], 200);
    }
    public function create(Request $request)
    {
        $title = $request->input("title");
        $body = $request->input("body");

        $isInserSucess = Post::insert([
            'title' => $title,
            'body' => $body,
        ]);

        return Response::json(['status' => 201, 'error' => null, 'data' => $request->all()], 201);
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        // if ($post) {
        //     return Response::json(['status' => 204, 'error' => null, 'data' => 'data deleting succesfuly'], 204);

        // }
        return "sorry your id is invalid or your data is already deleting";
    }
}









// * @OA\Put(
//     *      path="api/edit/{id}",
//     *      operationId="update the blog by id",
//     *      tags={"Blgo"},
//     *      summary="Update a your Blog",
//     *      description="Update a your Blog by its ID",
//     *      @OA\Parameter(
//     *          name="id",
//     *          description="ID of your Blog",
//     *          required=strue,
//     *          in="path",
//     *          @OA\Schema(
//     *              type="integer",
//     *              format="int64"
//     *          )
//     *      ),
//     *      @OA\RequestBody(
//     *          required=true,
//     *          @OA\JsonContent(
//     *              required={"title", "body"},
//     *              @OA\Property(property="title", type="string", example="Abdelkader"),
//     *              @OA\Property(property="body", type="string", example="Ouldn Hennia"),
//     *          ),
//     *      ),
//     *      @OA\Response(
//     *          response=200,
//     *          description="Successful operation"
//     *         
//     *      )
//     * )
