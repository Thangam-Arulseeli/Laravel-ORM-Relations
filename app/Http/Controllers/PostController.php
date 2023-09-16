<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use  App\Models\Post;
class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->get();
        return view('employee.home', compact('posts') );
    }

    public function softDelete($id){
        $data = Post::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function forceDelete($id){
        $data = Post::find($id);
        $data->forceDelete();
        return redirect()->back();
    }

    public function restore($id){
        $data = Post::withTrashed()->find($id);
        $data->restore();
        return redirect()->back();
    }

    public function show(){
        $posts = Post::withTrashed()->get();
        return view('employee.show', compact('posts') );
    }
}
