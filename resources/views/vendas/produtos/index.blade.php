@extends('admin.layouts.app')
@section('title','LISTAGEM DOS PEDIDOS')
@section('content')
    @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
    <div class="row">
        <div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Lista de Produtos</h3>
        </div>
        <div class="col-md-1 col-sm-1 d-flex justify-content-end">
            <a href="{{ route('pedidos.create') }}"
                class="btn btn-primary btn-sm" role="button" title="Novo cadastro">
                <i class="far fa-file-alt">
                    <span class="icon-label"><br>Novo</span>
                </i>
            </a>
        </div>
    </div>
     
      <div class="table-responsive">
        <table class="table table-striped">        
            <thead>
            <tr>      
                <th>Codigo</th>                
                <th>Nome</th>                
                 
                  
                <th>Opções</th>
            </tr>
            </thead>           
            <tbody>
                    @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                  
                   
          
                    <td>
                        <div class='d-flex'>     
                            <a href="{{ route('produtos.edit',$produto->id) }}"
                                class="btn" role="button" title="Detalhes" >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href=""
                                class="btn" role="button" title="Detalhes" >
                                <i class="fas fa-edit"></i>
                            </a>

                         

                           
                        </div>   
                    </td>
                </tr>
                @empty
               
                  
            @endforelse
            </tbody>
        </table>
    </div>



