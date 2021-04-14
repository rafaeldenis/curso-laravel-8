<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location; 
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    //
    // Relacionamento um para UM com pais e sua localização como longitudde e latitude
    public function oneToOne()
    {
        //Exemplo de Busca pelo nome para retorNA DEPOIS EM uma relacionamento quando usa get usar o First
        $country = Country::where('name','Brasil')->get()->first();
        //busca direto pelo id usa o find
        $country = Country::find(1);
       

        $location = $country->location;

        echo "Pais: $country->name  <hr> <br>Longitude : $location->longitude <br> Latitude $location->latitude ";
    }

    public function oneToOneInverse()
    {
        //Exemplo de Busca pelo nome para retorNA DEPOIS EM uma relacionamento quando usa get usar o First
      // dd ("RELACIONAMENTO ONE TO ONE INVERSO .. UM PARA UM partindo da tabela secundária no caso tabela location");

      $latitude = 123;
      $longitude = 321;

      $location = Location::where('latitude',$latitude)
        ->where('longitude',$longitude)
        ->get()->first();

        $country = $location->country;

        echo "Nome País : $country->name";
    }


    public function oneToOneInsert()
    {

            $dataForm = [
                'name' => 'Belgica',
                'latitude' => '654 ',
                'longitude' => '078',
            ];

            $country = Country::create($dataForm);
            
            //dd($country->id);
            //$location = new Location;
            //$locationSave = $country->location()->create($dataForm);
            //var_dump($locationSave); 

            $location = $country->location()->create($dataForm);
            //var_dump($location); 

           /* $location = new Location;

            $location->latitude = $dataForm['latitude'];
            $location->longitude = $dataForm['longitude'];
            $location->country_id = $country->id;
            $saveLocation = $location->save();*/

            return "salvouuu";

           
    }


    
}
