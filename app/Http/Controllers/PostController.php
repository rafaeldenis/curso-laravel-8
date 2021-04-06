<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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

    public function store(PostRequest $request){     
        
        //dd($request->all());
        $post = Post::create($request->all());

       return redirect()->route('posts.index');
    }

    public function show($id){
        if(!$post= Post::find($id)){
            return redirect()->route('posts.index');
        }       

      
       return view('admin.posts.show',compact('post'));

    }

    public function destroy($id){


        $post = Post::find($id);

        $deletar = $post->delete();

        

        return redirect()->route('posts.index')->with('message','Post Deletado com sucesso');


    }
}
