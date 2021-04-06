<?php

namespace App\Http\Controllers;

use App\Models\Cliente as ModelsCliente;
use Illuminate\Http\Request;

class Cliente extends Controller
{
    //

    public function index(){

        $clientes = ModelsCliente::get();

        //d($clientes);

       return view('admin.clientes.index',compact('clientes'));
    }
}
