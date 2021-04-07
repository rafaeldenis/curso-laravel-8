@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')
    @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
      <a href=" {{ route('clientes.create') }} "> CADASTRAR NOVO POST </a>
      <hr>
      

      @foreach ($clientes as $cliente)

            <p> {{$cliente->nome }} 
            
             <a href=" {{ route('clientes.edit',$cliente->id) }} "> Editar </a>
             
             ]    
            
            
            </p>

      @endforeach


