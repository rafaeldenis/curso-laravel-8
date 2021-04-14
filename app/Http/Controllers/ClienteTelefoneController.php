<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteTelefoneController extends Controller
{
    //

    public function clientesTelefones()
    {

        $cliente = Cliente::find(1)->with('telefones')->get()->first();
        //dd($cliente);
        echo "O CLIENTE $cliente->nome possui os seguintes TELEFONES <hr>";

        $telefones = $cliente->telefones()->get();

        //dd($telefones);

        foreach($telefones as $telefone)

        echo " <br> <b>$telefone->tipo_telefone :</b> $telefone->numero_telefone  <br>";

      
        }
}
