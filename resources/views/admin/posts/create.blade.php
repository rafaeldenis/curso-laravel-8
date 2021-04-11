@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')
<div class="d-flex justify-content-start align-items-baseline mb-3">
    <a href="{{route('posts.index')}}" class="btn botao-voltar" >
        <i class="fas fa-arrow-alt-circle-left"></i>
    </a>
    <h3>Novo Post</h3>
 </div>
<br>

<div class="w-11 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
    <form action="{{ route('posts.store') }}" method="post">  
        @include('admin.posts._partials.form')

    </form>
<div>