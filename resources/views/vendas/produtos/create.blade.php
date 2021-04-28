@extends('admin.layouts.app')
@section('title','NOVO CLIENTE')
@section('content')
<div class="d-flex justify-content-start align-items-baseline mb-3">
    <a href="{{route('clientes.index')}}" class="btn botao-voltar" >
        <i class="fas fa-arrow-alt-circle-left"></i>
    </a>
    <h3>Novo Pedido</h3>
 </div>
<br>
<form action="{{ route('pedidos.store') }}" method="post">
    @csrf
    @include('vendas.pedidos._partials.form')
</form>