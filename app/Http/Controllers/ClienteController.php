<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){

        //$cliente =  ModelsCliente::get();
        
        $cliente = ModelsCliente::create($request->all());

        return 'Gravou';


    }
}
