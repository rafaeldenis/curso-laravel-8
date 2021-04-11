@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>

        @endforeach
    
    </ul>

@endif
    @csrf

    <div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('title') ? 'has-error': '' }}">     
        <label for="title"> Descrição </label>
        <input
         type="text"
         name="title"
         id="title"
         placeholder="Título"
         value="{{ $post->title ?? old('title') }}"
        >
        
    </div>
</div>
<div class="row">    
    <div class="form-group col-md-7 {{ $errors->has('content') ? 'has-error': '' }}">     
        <label for="content"> Conteúdo </label>
        <textarea
         name="content"
          id="content"
          placeholder="Conteúdo">{{ $post->content ?? old('content') }}
        </textarea>
        
    </div>
</div>
    
    <button type="submit" class="btn btn-primary"> Enviar </button>