<h1>CADASTRAR NOVO POST</h1>
<form action="{{ route('posts.store') }}" method="post">
    @csrf

    <input type="text" name="title" id="title" placeholder="Título" >
    <textarea name="content" id="content" placeholder="Conteúdo"></textarea>
    <button type="submit">Enviar</button>



</form>