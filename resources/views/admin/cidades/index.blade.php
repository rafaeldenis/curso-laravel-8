@extends('admin.layouts.app')
@section('title','LISTAGEM DAS CIDADES')
@section('content')

     @if (session('message'))
     <div class="alert alert-success" role="alert">
            {{ session('message') }}
    </div>
     @endif
     <form action="{{ route('posts.search') }}" method="post">
     @csrf
            <input type="text" name="search" placeholder="Filtro">

            <button type="submit">Pesquisar</button>
     
     
     </form>
      <a href=" {{ route('posts.create') }} "> CADASTRAR NOVA CIDADE </a>
      <hr>

<div class="row">
        <div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Lista de cidades</h3>
        </div>
        <div class="col-md-1 col-sm-1 d-flex justify-content-end">
            <a href="{{ route('cidades.create') }}"
                class="btn btn-primary btn-sm" role="button" title="Novo cadastro">
                <i class="far fa-file-alt">
                    <span class="icon-label"><br>Novo</span>
                </i>
            </a>
        </div>
</div>
      <h3 class="text-center text-3x1 uppercase font-black my-4">LISTAGEM CIDADES</h3>
      <div class="table-responsive">
        <table class="table table-striped">        
            <thead>
            <tr>      
                <th>Id</th>                
                <th>Nome</th>                
                <th>Opções</th>
            </tr>
            </thead>           
            <tbody>
                    @forelse($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->id }}</td>
                    <td>{{ $cidade->name }}</td>
                   
          
                    <td>
                        <div class='d-flex'>     
                            <a href="{{ route('cidades.show',$cidade->id) }}"
                                class="btn" role="button" title="Detalhes" >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('cidades.edit',$cidade->id) }}"
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

     

      <hr>
      @if (isset($filters))

            {{ $cidades->appends($filters)->links() }}
      @else
            {{ $cidades->links() }}
      @endif
     
 

