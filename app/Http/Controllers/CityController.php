<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //echo("LISTAR CIDADESSSSS");

        $cidades = City::paginate();

        //dd($posts);

       return view('admin.cidades.index',compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        if(!$cidade = City::find($id)){
            return redirect()->route('cidades.index');
        }     


        $companies = $cidade->companies;

        //dd($companies);


       
        
        
       return view('admin.cidades.show',compact('companies','cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        //detach deleta só o item especifico da tabela pivot  detach
        $deletar = Company::find($id)->cities()->detach();

        return redirect()->route('cidades.index')->with('message','compania deletada da cidade');


        
    }

    public function getCidades()
    {
        //

        //echo("LISTAR CIDADESSSSS");

        //$cidades = City::paginate();
        $cidades = City::all();

        //dd($posts);

        //$json = json_enconde($cidades); // transforma em json
        return response()->json($cidades); // retorna uma resposta com o json

       //return view('admin.cidades.index',compact('cidades'));
    }
}
