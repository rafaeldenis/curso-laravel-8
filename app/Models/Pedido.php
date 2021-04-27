<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function cliente()
    {

        return $this->belongsTo(Cliente::class);
    }

    public function produto()
    {

        return $this->belongsTo(Produto::class);
    }
}
