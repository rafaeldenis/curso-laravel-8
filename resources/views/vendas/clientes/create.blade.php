<h1>CADASTRAR NOVO cliente</h1>
<form action="{{ route('clientes.store') }}" method="post">
    @csrf
    @include('admin.clientes._partials.form')
</form>