<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;

    protected $table = 'clientes';
    public $timestamps = false;
    protected $primarykey = 'id';


    protected $fillable = [ 
        'nome',
        'apelido'
             
    ];


    public function telefones()
    {

        return $this->hasMany(Telefone::class);
    }
    
    public function pedidos()
    {

        return $this->hasMany(Pedido::class);
    }
}
