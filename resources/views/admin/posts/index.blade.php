@extends('admin.layouts.app')
@section('title','LISTAGEM DOS POSTS')
@section('content')

     @if (session('message'))
     <div>
            {{ session('message') }}
    </div>
     @endif
     <form action="{{ route('posts.search') }}" method="post">
     @csrf
            <input type="text" name="search" placeholder="Filtro">

            <button type="submit">Pesquisar</button>
     
     
     </form>
      <a href=" {{ route('posts.create') }} "> CADASTRAR NOVO POST </a>
      <hr>

<div class="row">
        <div class="col-md-11 col-sm-11 d-flex align-items-center">
            <h3>Lista de Eventos</h3>
        </div>
        <div class="col-md-1 col-sm-1 d-flex justify-content-end">
            <a href="{{ route('posts.create') }}"
                class="btn btn-primary btn-sm" role="button" title="Novo cadastro">
                <i class="far fa-file-alt">
                    <span class="icon-label"><br>Novo</span>
                </i>
            </a>
        </div>
</div>
      <h1 class="text-center text-3x1 uppercase font-black my-4">LISTAGEM POSTS</h1>
      <div class="table-responsive">
        <table class="table table-striped">        
            <thead>
            <tr>      
                <th>Título</th>                
                <th>Opções</th>
            </tr>
            </thead>           
            <tbody>
                    @forelse($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                   
          
                    <td>
                        <div class='d-flex'>     
                            <a href="{{ route('posts.show',$post->id) }}"
                                class="btn" role="button" title="Detalhes" >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('posts.edit',$post->id) }}"
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

            {{ $posts->appends($filters)->links() }}
      @else
            {{ $posts->links() }}
      @endif
     
 

