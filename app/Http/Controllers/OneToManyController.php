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
        dd("aquiiiiiiiii");
    }
}
