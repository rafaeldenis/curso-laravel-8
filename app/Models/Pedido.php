<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    
    protected $table = 'pedidos';
    public $timestamps = false;
    protected $primarykey = 'id';

    protected $fillable = [ 
        'cliente_id',
        'produto_id',
        'quantidade',
        'total'
             
    ];


    public function cliente()
    {

        return $this->belongsTo(Cliente::class);
    }

    public function produto()
    {

        return $this->belongsTo(Produto::class);
    }
}
