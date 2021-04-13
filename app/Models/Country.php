<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    // função um para um nome no singular

    protected $fillable = ['name']; 
   

    public function location()
    {
        //se tiver fora do padrão laravel com  o nome Id vc tem que colocar
        // a chave estrangeira e a chava da tabela principal
        //return $this->hasOne(Location::class,'country_id','id');
        return $this->hasOne(Location::class);

    }

    public function states()
    {
        /// relacionamento um para muitos um pais possui muitos estados

        return $this->hasMany(State::class);
    }
}
