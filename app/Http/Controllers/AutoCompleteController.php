<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    //
    public function index(){

        $clientes = Cliente::orderBy('nome','asc')->get();

        return view('autocomplete.autocomplete',compact('clientes'));
     }
    public function getAutoComplete(Request $request){
        //echo "aquiii";
        $search = $request->search;
        //$search = 'rafael';

        //dd($search);
  
        if($search == ''){
           $autocomplate = Cliente::orderby('nome','asc')->select('id','nome')->limit(5)->get();
        }else{
           $autocomplate = Cliente::orderby('nome','desc')->select('id','nome')->where('nome', 'like', '%' .$search . '%')
           ->orWhere('apelido', 'like', '%' .$search . '%')->orWhere('id',$search)->limit(5)->get();
        }

        //dd($autocomplate);
  
        $response = array();
        foreach($autocomplate as $autocomplate){
           $response[] = array("value"=>$autocomplate->id,"label"=>$autocomplate->nome);
        }
  
        echo json_encode($response);
        exit;
     }
}
