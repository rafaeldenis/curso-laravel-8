@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')

     @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
     <form action="{{ route('posts.search') }}" method="post">
     @csrf
            <input type="text" name="search" placeholder="Filtro">

            <button type="submit">Pesquisar</button>
     
     
     </form>
      <a href=" {{ route('posts.create') }} "> CADASTRAR NOVO POST </a>
      <hr>


      @foreach ($posts as $post)

            <p> {{$post->title }} 
            
             [<a href=" {{ route('posts.show',$post->id) }} "> Detalhes </a> |
             <a href=" {{ route('posts.edit',$post->id) }} "> Editar </a>
             
             ]
             
            </p>

      @endforeach

      <hr>
      @if (isset($filters))

            {{ $posts->appends($filters)->links() }}
      @else
            {{ $posts->links() }}
      @endif
     
 

