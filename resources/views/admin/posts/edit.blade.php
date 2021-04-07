<h1>ATUALIZAR POST</h1>

@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>

        @endforeach
    
    </ul>

@endif
<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title }}" >
    <textarea name="content" id="content" placeholder="Conteúdo">{{ $post->content }}</textarea>
    <button type="submit">Editar</button>



</form>