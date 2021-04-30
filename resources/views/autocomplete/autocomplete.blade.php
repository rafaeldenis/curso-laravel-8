<!DOCTYPE html>
<html>
  <head>
    <title>Laravel Autocomplete Search With Jquery UI Example</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha256-IdfIcUlaMBNtk4Hjt0Y6WMMZyMU0P9PN/pH+DFzKxbI=" crossorigin="anonymous" />

    <!-- Script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  </head>
  <body>

  <div class="container mt-3">
      <div class="row">
        <div class="col-md-10 offset-1 text-center">
          <div class="card">
            <div class="card-header bg-success text-white">
              <h3>Laravel Autocomplete Search With Jquery UI Example - Nicesnippets.com</h3>
            </div>
            <div class="card-body" style="height: 210px;">
                <input type="text" id='employee_search' placeholder="--search--">
            </div> 
          </div>
        </div>
      </div>
    </div>

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
                <th>id</th>                
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
                    <td>{{ $cliente->id }}</td>
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

   

    <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('AutoComplete.getAutoComplete')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#employee_search').val(ui.item.label);
           $('#employeeid').val(ui.item.value); 
           return false;
        }
      });

    });
    </script>
  </body>
</html>	