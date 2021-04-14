<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    //

    public function oneToMany()
    {
        //dd("aquii");

        //$country = Country::where('name','Brasil')->get()->first();
        $keySearch = 'a';
         //$countries = Country::where('name','Like',"%{$keySearch}%")->get();
         //agoora o exemplo com (with) que é um método para chamar o relaciomento 
         // e retornar os dados em uma única coleção ... isso otimiza nossa consulta no banco
         $countries = Country::where('name','Like',"%{$keySearch}%")->with('states')->get();
         //dd($countries);
        // condição com pesquisa e where
        //$states = $country->states()->where('initials','GO')->get();
        //$states = $countries->states()->get();

        //dd($states);

        foreach($countries as $country){

           echo "<b> Nome País: {$country->name} </b> <hr>";

           $states = $country->states()->get();

           foreach($states as $state){

                echo "<br>{$state->initials} | {$state->name } <br> ";
            }
            echo "<br>";
        }

        

    }

    public function oneToManyTwo()
    {
        //dd("aquii");

        //$country = Country::where('name','Brasil')->get()->first();
        $keySearch = 'a';
         //$countries = Country::where('name','Like',"%{$keySearch}%")->get();
         //agoora o exemplo com (with) que é um método para chamar o relaciomento 
         // e retornar os dados em uma única coleção ... isso otimiza nossa consulta no banco
         $countries = Country::where('name','Like',"%{$keySearch}%")->with('states')->get();
         //dd($countries);
        // condição com pesquisa e where
        //$states = $country->states()->where('initials','GO')->get();
        //$states = $countries->states()->get();

        //dd($states);

        foreach($countries as $country){

           echo "<b> Nome País: {$country->name} </b> <hr>";

           $states = $country->states()->get();

           foreach($states as $state){

                echo "<br>{$state->initials} | {$state->name }  ";

                foreach($state->cities as $city){

                    echo "{$city->name }  |   ";
                }
            }
            echo "<br>";
        }

        

    }

    public function hasManyThrough()
    {
        //dd('aqui');
        //  hasM anyThrough nesse relacionamento pulamos de chamar o método de Estados
        // fomos direto para uma ligação entre País  e Cidade . Esse tipo de relacionamento já 
        //resolveu por configuração na model e não precisa informa nos métodos.
        $country = Country::find(1);

        echo "<b>  $country->name </b> <br>";

        $cities = $country->cities;

        foreach($cities as $citie)
        {

            echo "$citie->name ,";
        }
        
        
    }

    public function manyToOne(){

       // $states = State::find(8);
        //dd($states->country_id);
        // busca por id
       // $country = Country::find($states->country_id);

        $stateName = "Xangai";

        $state = State::where('name',$stateName)->get()->first();
        $country = $state->country;
        //dd($country);

        echo "<br> O ESTADO $state->name <br> <b>pretence ao PÁIS $country->name </b>";
    }

    public function oneToManyInsert()
    {
        // SIMULA DADOS QUE VEM DE UM FORM POR EXEMPLO ... 
        //VAMOS GRAVAR DIRETO PELOS RELACIONAMENTOS SEM NECESSIDADE DE SQL E INSTRUÇÕES DIVERSAS
        $dataForm = [
        'name'=>'Alagoas',
        'initials'=>'AL',
        'teste'=>'teste',
        ];
        $country = Country::find(1);
          //dd($country->name);

       $insertState =  $country->states()->create($dataForm);
       var_dump($insertState->name);

        //return  "salvou o novo estado";

     //dd(states);
    }

    public function oneToManyInsertTwo()
    {
        // SIMULA DADOS QUE VEM DE UM FORM POR EXEMPLO ... 
        //VAMOS GRAVAR DIRETO PELOS RELACIONAMENTOS SEM NECESSIDADE DE SQL E INSTRUÇÕES DIVERSAS
        $dataForm = [
        'name'=>'Amazonas',
        'initials'=>'AM',
        'country_id'=>'1',
        ];
        
          //dd($country->name);
        // aqui quando não precisamos buscar o páis antes e já temos todos os dados do form state
       $insertState = State::create($dataForm);
       var_dump($insertState->name);

        //return  "salvou o novo estado";

     //dd(states);
    }
}
