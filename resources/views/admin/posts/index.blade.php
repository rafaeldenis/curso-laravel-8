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



      <div class="table-responsive">
        <table class="table table-striped tabela-unifesp">        
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
                                class="btn" role="button" title="Detalhes" data-toggle="tooltip" data-placement="top">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('posts.edit',$post->id) }}"
                                class="btn" role="button" title="Detalhes" data-toggle="tooltip" data-placement="top">
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
     
 

