<h1>editar cliente</h1>
<form action="{{ route('clientes.update', $cliente->id) }}" method="post">    
    @method('put')
    @include('admin.clientes._partials.form')
</form>