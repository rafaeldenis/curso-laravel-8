<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    //
    public function index()
    {

        //echo "LISTAR TODOS OS PEDIDOS";

        $pedidos = Pedido::all()->sortBy('cliente_id');

        return view('vendas.pedidos.index',compact('pedidos'));
    }
    public function create()
    {

        //echo "LISTAR FORM PEDIDOS GRAVAR";
        $clientes = Cliente::all()->sortBy('nome');
        $produtos = Produto::all()->sortBy('nome');
        //dd($comboClientes);
        //$cliente_id = ['Todos os clientes'];
        /*foreach($comboClientes as $key => $comboCliente){
            $cliente_id[$comboCliente['id']] = $comboCliente["nome"]; 
        }*/
        return view('vendas.pedidos.create',compact('clientes','produtos'));
    }

    public function store(Request $request)
    {
        
        $dados = $request->all();

        $gravar = Pedido::create($dados);
        //echo "EFETUAR AS GRAVAÇÕES DO PEDIDOS RELACIONADO COM O CLIENTE";

        return redirect()->route('clientes.index')->with('message','O Pedido  foi gravado com sucesso ');
    }
}
