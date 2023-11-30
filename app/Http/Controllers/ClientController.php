<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;

use Illuminate\Http\Request;

class ClientController extends Controller
{
        public function InsertClient(Request $request){
            $name = $request->input("name");
            $email = $request->input("email");
            $age = $request->input("age");
            $usefull = $request->input("usefull");
            $message = $request->input("message");

            $validatePost = Client::insert([
                'name' => $name,
                'email' => $email,
                'age' => $age,
                'usefull' => $usefull,
                'message' => $message
            ]);
            if ($validatePost) {
                return view("suesses");
                // echo "yes";
            }else{
                echo"no";
            }
        }
}
