<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente as ModelsCliente;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //

    public function index(){

        $clientes = ModelsCliente::get();

        //d($clientes);

       return view('admin.clientes.index',compact('clientes'));
    }

    public function create(){

        return view('admin.clientes.create');
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
       return view('admin.clientes.edit',compact('cliente'));
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
