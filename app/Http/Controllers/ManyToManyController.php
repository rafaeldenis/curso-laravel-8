<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    //

    public function manyToMany()
    {
        //dd('aqui');
        $city = City::where('name','CARAPICUIBA')->get()->first();
        echo "$city->name <br> <b>Empresas </b>";

        $companies = $city->companies;

        foreach($companies as $company)
        {
            echo "$company->name ,";
        }
    }

    public function manyToManyInverse()
    {
        
        $companie = Company::where('name','Ambev')->get()->first();

        echo "<b> Empresa: </b> $companie->name <br> <b>Cidades:<b>";

        $cities = $companie->cities;

        foreach($cities as $city)
        {
            echo "$city->name | ";
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [2,4];     
        $company = Company::where('name','Oracle')->get()->first();
        //o ATATACH VAI ADICIONANDPO MESMO QUE SEJA REPETIDO A ASSOIAÇÃO
        //$company->cities()->attach($dataForm);
        // O sinc não repete o registro se já tiver só vai pegar os itens novos
        $company->cities()->sync($dataForm);

        $cities = $company->cities;
        echo " $company->name <br> ";
        foreach($cities as $city)
        {
            echo " $city->name | ";
        }


    }
}
