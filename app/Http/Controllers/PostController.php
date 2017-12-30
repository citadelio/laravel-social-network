<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\post;
class PostController extends Controller
{
    public function send(Request $request, post $post ){
            $this->validate($request, [
                'message' => 'required'
            ]);
        $post->message = $request->message;
    //    $id = Auth::user()->id;
        $post->save();

        if($request->ajax()){
            $status = 'Post Successfu';
            return response($request->all());
        }

    }
}
