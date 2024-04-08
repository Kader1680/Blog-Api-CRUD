<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;

use Illuminate\Http\Request;

class ClientController extends Controller
{
        public function InsertClient(Request $request){
            
            $client = Client::create($request->all());
            if ($client) {
                return "df";
            }
        }
}
