<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
Use  App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
       // $posts = Post::with('user')->get();
      //  return view('employee.home', compact('posts') );

      // Calling Stored Procedure for Display all // SP created in MySQL
     // $posts = DB::select('CALL GetPosts()');
     // return view('employee.home')->with(['posts' => '$posts' ]); // Err came
     //return view('employee.home', compact('posts') );
    
    // Calling Stored Procedure for insert record // SP created in Migration file 
    // DB::insert("CALL InsertPost(1, 'Welcome', 'Hearty Welcome To You')");
    // DB::insert("CALL InsertPost(1, 'Call me', 'Call me later')");
    // DB::insert("CALL InsertPost(3, 'Congratulation', 'Congrats for your achievement')");
    
    // Calling Stored Procedure for Display all // SP created in MySQL
    $posts = DB::select('CALL GetPost("Welcome")');
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
