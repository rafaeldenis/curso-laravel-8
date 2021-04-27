@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')
    @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
    <div class="row">
        <div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Lista de Clientes</h3>
        </div>
        <div class="col-md-1 col-sm-1 d-flex justify-content-end">
            <a href="{{ route('clientes.create') }}"
                class="btn btn-primary btn-sm" role="button" title="Novo cadastro">
                <i class="fas fa-user-plus">
                    <span class="icon-label"><br>+Cliente</span>
                </i>
            </a>&nbsp;

            <a href="{{ route('pedidos.create') }}"
                class="btn btn-primary btn-sm" role="button" title="Novo cadastro">
                <i class="fas fa-search-dollar">
                    <span class="icon-label">+Pedido</span>
                </i>
            </a>
        </div>

        
    </div>

    
     
      <div class="table-responsive">
        <table class="table table-striped">        
            <thead>
            <tr>      
                <th>Nome</th>                
                <th>Apelido</th>                
                <th>Email</th>                
                <th>Telefone</th>                
                <th>Opções</th>
            </tr>
            </thead>           
            <tbody>
                    @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->apelido }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                   
          
                    <td>
                        <div class='d-flex'>     
                            <a href="{{ route('clientes.show',$cliente->id) }}"
                                class="btn" role="button" title="Visualizar Pedidos" >
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="{{ route('clientes.edit',$cliente->id) }}"
                                class="btn" role="button" title="Editar Clientes" >
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

@push('scripts')
<script> 
    if (window.jQuery) {
    // jQuery is available.
        alert('kkkkk');
    // Print the jQuery version, e.g. "1.0.0":
    console.log(window.jQuery.fn.jquery);
}


</script>
@endpush

