<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    //

    public function index()
    {

            $posts = Post::get();

            //dd($posts);

           return view('admin.posts.index',compact('posts'));
    }

    public function create(){

        return view('admin.posts.create');
    }

    public function store(Request $request){     
        
        //dd($request->all());
        $post = Post::create($request->all());

        return 'OK';
        //dd("CADASTRRRRA FASHFJKASFHAFJA AQUII");
    }
}
