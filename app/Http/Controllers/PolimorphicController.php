<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Comment;

class PolimorphicController extends Controller
{
    //

    public function polymorphic()
    {

        // listar comentários de um determnada cidade

        $city = City::where('name','Osasco')->get()->first();
        $state = State::where('name','São Paulo')->get()->first();

        $country = Country::where('name','Brasil')->get()->first();

        echo"$country->name <br>";
        $comments = $country->comments()->get();

        foreach($comments as $comment)
        {
            echo "{$comment->description} <br> <hr>";     

        }
     

        //dd("aquiii relacionamento polymorphic");
    }
    public function polymorphicInsert()
    {
         
        // adicionar cidade com relacionamento  pOLYMORPHIC 
        //onde centraliza um tabela de comments para várias outras tableas como 
        // cidade / estado e País

        $city = City::where('name','Osasco')->get()->first();
        //dd($city->name);

        /// aquiii grava states tbm na mesma tabela central de comentários usandos 
        // o relacionamento Polymorphic .... e na description_type grava a Model que está 
        // sendo usada ....sesacional esse relacionamento
        $state = State::where('name','Bahia')->get()->first();

        $country = Country::where('name','Belgica')->get()->first();
        
        $comment = $city->comments()->create([
        'description'=>" OSASCO A CIDADE DOS SHOPPINGS  KKKKKKKKKKKK{$city->name}".date('YmdHis'),   

        ]);
        dd($comment->description);
    }
}
