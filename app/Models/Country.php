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
        //quando referenciamos o foreing Key para casos que a chave não segue 
        //o padrão do laravel que é o id
        //return $this->hasMany(State::class,'country_id','id');
    }

    public function cities()
    {

        return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
