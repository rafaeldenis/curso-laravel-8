@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')
    @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
     <h1 class="text-center text-3x1 uppercase font-black my-4">LISTAGEM CLIENTES</h1>
      <div class="table-responsive">
        <table class="table table-striped">        
            <thead>
            <tr>      
                <th>Nome</th>                
                <th>Apelido</th>                
                <th>Opções</th>
            </tr>
            </thead>           
            <tbody>
                    @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->apelido }}</td>
                   
          
                    <td>
                        <div class='d-flex'>     
                            <a href="{{ route('clientes.edit',$cliente->id) }}"
                                class="btn" role="button" title="Detalhes" >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('posts.edit',$cliente->id) }}"
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



