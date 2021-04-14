<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name','initials','country_id'];

    public function country()
    {
         // relacionamento incverso muitos para um ... nocaso muitos estados para apenas um País
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {

        return $this->hasMany(City::class);
    }
}
