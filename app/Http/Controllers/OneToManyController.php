<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    //

    public function oneToMany()
    {
        //dd("aquii");

        //$country = Country::where('name','Brasil')->get()->first();
        $keySearch = 'a';
         $countries = Country::where('name','Like',"%{$keySearch}%")->get();
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
}
