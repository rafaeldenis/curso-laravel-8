@extends('admin.layouts.app')
@section('title','LISTAGEM DAS CIDADES')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
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

    <table id="minhaTabela" name="minhaTabela" class="table-responsive">
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>apelido</td>
                <td>apelido</td>
                <td>apelido</td>
                
              
            </tr>
        </thead>
        <tbody>
       
           
        </tbody>
        </table>

        <table border="0" cellpadding="0" width="100%" id='providersFormElementsTable'>1 </table>

     

      <hr>
      @if (isset($filters))

            {{ $cidades->appends($filters)->links() }}
      @else
            {{ $cidades->links() }}
      @endif
      <script>

      // EXEMPLO BUSCA EM UM CONTROLLER E RETORNA $JSON PARA TRABALHAR NO $JQUERY
       $(document).ready(function(){
          
       /* $linha = "<tr>"+
        "<td>Nickname</td>"+
        "<td>Nickname</td>"+
        "<td>Nickname</td>"+
        "<td>Nickname</td>"+
        "<td>Nickname</td>"+
      
        "</td></tr>" ;
        $("#minhaTabela > tbody").append($linha);*/

                $.ajax({
        'processing': true, 
        'serverSide': true,
          type: "GET",
          // passar parametro caso o serviço ou conttrole  precise para consulta 
          //data: {item_categoria: $("#item_categoria").val()},
          url: "/admin/get-cidades-json",
          datatype: "json",
          success: function(retornos) {
            //id  =  retorno[0].id ;
            //name  =  retorno[0].name ;

           // alert(id);
           //alert(name);
            //foreach com $jquery com o metodo $.eacck que percoorerr todo arrary de objeto json 
            $.each(retornos,function(c,retorno){
              
                teste = retorno.name;
                //alert(teste);

                   
            
            });

          

            if(retornos[0].erro){
			    $("h2").html(retornos[0].erro);
		    }
		    else{
			    //Laço para criar linhas da tabela
                //alert("alert aquiii");
			    for(var i = 0; i<retornos.length; i++){
                    teste = retornos[i].id;
                    teste1 = retornos[i].name;
                    //alert(teste);
                    //alert(teste1);

                    
				    $linha = "<tr>"+
                            "<td>"+retornos[i].id +"</td>"+
                            "<td>"+retornos[i].name +"</td>"+
                            "<td>"+retornos[i].name +"</td>"+
                            "<td>"+retornos[i].name +"</td>"+
                            "<td>"+retornos[i].name +"</td>"+
                        
                            "</td></tr>" ;
                            $("#minhaTabela > tbody").append($linha);

                  //$('#minhaTabela > tbody').append(itens);
                  

                  

                    //alert(itens);*/
			    }

                //alert(itens);
			    //Preencher a Tabela
			    //$("#minhaTabela ").append(itens);

                $("#minhaTabela>tbody").append(itens);
                $("#minhaTabela>tbody").html(itens);
			    
			    //Limpar Status de Carregando
			    //$("h2").html("Carregado");
		    }

            

            
         
          }

      });
            });
</script>
     
 

