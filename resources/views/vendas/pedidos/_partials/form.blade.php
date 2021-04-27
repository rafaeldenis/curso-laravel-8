@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>

        @endforeach
    
    </ul>

@endif

@csrf
<div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('nome') ? 'has-error': '' }}">     
        <label for="nome"> Nome </label>
        <input
         type="text"
         name="nome"
         id="nome"
         placeholder="nome"
         value="{{ $cliente->nome ?? old('nome') }}"
        >
        
    </div>
</div>
<div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('apelido') ? 'has-error': '' }}">     
        <label for="apelido"> Conteúdo </label>
        <input
         type="text"
         name="apelido"
         id="apelido"
         placeholder="Apelido"
         value="{{ $cliente->apelido ?? old('apelido') }}"
        >
        
    </div>
</div>
    
    <button type="submit" class="btn btn-primary"> Enviar </button>