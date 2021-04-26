@extends('admin.layouts.app')
@section('title','DETALHES')
@section('content')



<div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Detalhes Posts</h3>
</div>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><strong>Título do Post</strong> : {{$post->title}}</h5>
      <small>DETALHES DO POST {{$post->id}}</small>
    </div>
    <p class="mb-1"><strong>COnteúdo do Post</strong> : {{$post->content}}</p>
    <small>Detalhes</small>
  </a>
 
</div><br>

<form action="{{ route('posts.destroy',$post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" >
    <button type="submit" class="btn btn-danger"> Deletar </button>

</form>



<div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Detalhes Posts</h3>
</div>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><strong>Título do Post</strong> : {{$post->title}}</h5>
      <small>DETALHES DO POST {{$post->id}}</small>
    </div>
    <p class="mb-1"><strong>COnteúdo do Post</strong> : {{$post->content}}</p>
    <small>Detalhes</small>
  </a>
 
</div><br>

<form action="{{ route('posts.destroy',$post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" >
    <button type="submit" class="btn btn-danger"> Deletar </button>

</form>