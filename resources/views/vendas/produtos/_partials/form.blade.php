@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>

        @endforeach
    
    </ul>

@endif

@csrf



<div class="row">
    <div class="form-group col-md-7 {{ $errors->has('cliente_id') ? 'has-error': '' }}">    
      <label for="cliente_id"> Clientes </label>
        <select type="text" name="cliente_id" id="cliente_id" class="form-control {{$errors->has('cliente_id') ? 'is-invalid' : ''}} "> 
                <option value="" selected >Selecione</option>   
            @foreach ($clientes as $cliente) 
                <option value="{{$cliente->id}}" {{$cliente->id == old('cliente_id') ? 'selected' : '' }}> {{$cliente->nome}} </option> 
            @endforeach 
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-7 {{ $errors->has('produto_id') ? 'has-error': '' }}">    
      <label for="produto_id"> Produtos </label>
      <select type="text" name="produto_id" id="produto_id" class="form-control {{$errors->has('produto_id') ? 'is-invalid' : ''}} "> 
         <option value="" selected >Selecione</option>   
        @foreach ($produtos as $produto)
            <option value="{{$produto->id}}" {{$cliente->id == old('produto_id') ? 'selected' : '' }}> {{$produto->nome}} </option>
         @endforeach 
      </select>
    </div>
</div>

<div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('quantidade') ? 'has-error': '' }}">     
        <label for="quantidade"> Quantidade </label>
        <input
         type="number"
         name="quantidade"
         id="quantidade"
         placeholder="quantidade"
         value=""
        >
        
    </div>
</div>


<div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('quantidade') ? 'has-error': '' }}">     
        <label for="quantidade"> TOTAL </label>
        <input
         type="number"
         name="total"
         id="total"
         placeholder="total"
         value="10"
        >
        
    </div>
</div>

    
    <button type="submit" class="btn btn-primary"> Pedir </button>