@extends('admin.layouts.app')
@section('title','EDITAR CLIENTE')
@section('content')
<h1>editar cliente</h1>
<form action="{{ route('clientes.update', $cliente->id) }}" method="post">    
    @method('put')
    @include('vendas.clientes._partials.form')
</form>