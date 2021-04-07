<h1>CADASTRAR NOVO POST</h1>
<form action="{{ route('posts.store') }}" method="post">  
    @include('admin.posts._partials.form');

</form>