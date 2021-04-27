@extends('admin.layouts.app')
@section('title','DETALHES')
@section('content')
<div class="alert alert-success col-md-11 col-sm-11 d-flex align-items-center">
    <h3>Total de Produtos : {{ $total_quantidade }} <br> <hr>Total Dívida Ativa : R$ :  {{ $total_divida }} </h3>
</div>
        @foreach($pedidos as $pedido)


            <div class="col-md-11 col-sm-11 d-flex align-items-center">
                        <h3>Detalhes Pedidos</h3>
            </div>
            <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><strong>Descrição Produto </strong> : {{ $pedido->produto_id }} - {{ $pedido->produto->nome }} -  </h5>
                <small>CLIENTE / APELIDO :  {{ $pedido->cliente->nome}} / {{ $pedido->cliente->apelido }}</small>
                </div>
                <p class="mb-1"><strong>Quantidade</strong> : {{ $pedido->quantidade }} </p>
                <small>Total para pagar :  R$ : {{ $pedido->total }} </small>
            </a>
            
            </div><br>

            <form action="" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE" >
                <button type="submit" class="btn btn-danger"> Deletar </button>

            </form>


        @endforeach
           




