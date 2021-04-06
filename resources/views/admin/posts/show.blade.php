<h1>DETALHES DO POST {{$post->id}}</h1>


<ul>
    <li><strong>Título do Post</strong> : {{$post->title}}</li>
    <li><strong>COnteúdo do Post</strong> : {{$post->content}}</li>    
</ul>

<form action="{{ route('posts.destroy',$post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE" >
    <button type="submit"> Deletar </button>

</form>