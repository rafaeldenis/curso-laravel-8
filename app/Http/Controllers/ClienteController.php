<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente as ModelsCliente;
use App\Models\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //

    public function index(){

        $arr_numeros_sorteados = array(); 
        //Vamos usar um laço while para que enquanto não tivermos os 6 números, continuar a sortear.
        while (count($arr_numeros_sorteados) < 6){
        $numero_sorteado = mt_rand(1,60); // Irá sortear um numero dentro do intervalo de 1 até 60

        //Antes de salvar o numero sorteado, verificamos se ele já foi sorteado anteriormente
        if( !in_array($numero_sorteado, $arr_numeros_sorteados) ){
            $arr_numeros_sorteados[] = $numero_sorteado; //Armazena o numero sorteado no array.
        }
        }

        echo 'Números Sorteados: '. implode(', ', $arr_numeros_sorteados);

        $clientes = ModelsCliente::orderBy('nome')->get();

        //d($clientes);

       return view('vendas.clientes.index',compact('clientes'));
    }

    public function show($id)
    { 
        
       
        $pedidos = Pedido::where('cliente_id',$id)->where('pago','N')->get();
        //dd($pedidos);
        $total_quantidade = $pedidos->sum('quantidade');
        $total_divida = $pedidos->sum('total');

       
       /* foreach($pedidos as $pedido)
        {
            echo " NOME PRODUTO {$pedido->produto->nome} PEDIDO  cliente id : $pedido->cliente_id  e PRODUTO $pedido->produto_id <br> <hr>";
        }*/
        //$produto = $p->produto;
        //dd($produto);

       // $produto = Produto::find($id);

        //dd($produto);


        //echo  "EXIBIR DETALHES DE PEDIDOS do CLIENTE:  $cliente->nome <br> <hr>";       


        return view('vendas.clientes.show',compact('pedidos','total_quantidade','total_divida'));     

        //dd($pedidos);
    }

    public function create(){

        return view('vendas.clientes.create');
    }

    public function store(ClienteRequest $request){

        //$cliente =  ModelsCliente::get();
        
        $cliente = ModelsCliente::create($request->all());

        return redirect()->route('clientes.index')->with('message','O Cliente foi gravado com sucesso');


    }

    public function edit($id){

       //echo  "TELA PARA CHAMAR FORMULÁRIO DE EDIÇÃO DO $id";
       if(!$cliente= ModelsCliente::find($id)){
        return redirect()->back();
       }       
       return view('vendas.clientes.edit',compact('cliente'));
    }

    public function update(Request $request,$id){

        if(!$cliente= ModelsCliente::find($id)){
            return redirect()->back();
        }       

        $dados = $request->all();

        $cliente->update($dados);

        return redirect()->route('clientes.index')->with('message','Post Atualizado com sucesso');

    


    }
}
