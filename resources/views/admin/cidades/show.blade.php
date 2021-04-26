@extends('admin.layouts.app')
@section('title','DETALHES')
@section('content')

<div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3> Listas Empresas na cidade de   {{ $cidade->name}}</h3>
</div>
@foreach($companies as $company)

           
    


<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><strong>Compania Nome</strong> : {{ $company->name }}</h5>
      <small>DETALHES DO POST {{$company->id}}</small>
    </div>
    <p class="mb-1"><strong>Compania</strong> :  {{ $company->name }}</p>
    <small>VALOR DA COMPANIA AVALIADA 10 MILHÕES DE REAIS {{ $company->pivot }} - {{ $company->pivot }}</small>
  </a>
 
</div><br>

<form action="{{ route('cidades.destroy', $company->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" >
    <button type="submit" class="btn btn-danger"> Deletar </button>

</form>

@endforeach


