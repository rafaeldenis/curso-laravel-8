<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;

    protected $table = 'clientes';
    public $timestamps = false;
    protected $primaryKey = "codigo";

    protected $fillable = [ 
        'nome',
        'apelido'
             
    ];
}
