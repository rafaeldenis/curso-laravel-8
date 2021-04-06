<h1>CADASTRAR NOVO cliente</h1>
<form action="{{ route('clientes.store') }}" method="post">
    @csrf

    <div class="form-group">
            <label for="id">ID</label>
            <label for="nome" class='class_font_rotulo'>nome</label>
            <input type="text" name="id" placeholder="26" readonly value="auto" id="id">
            
            <input type="text" name="nome" placeholder="John Doe" id="nome" required="S" >
            <div id="div_error_nome" class="class_error"></div>
             
    </div>  
    <div class="form-group">
        <label for="apelido" class_font_rotulo>Apelido</label>
        <label for="apelido"></label>

        <input type="text" name="apelido" placeholder="pamonha" id="apelido">
        
    </div>
 
   
    <button type="submit">Enviar</button>



</form>