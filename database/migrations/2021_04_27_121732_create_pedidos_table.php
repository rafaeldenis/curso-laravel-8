<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
        $table->integer('cliente_id')->unsigned();
        $table->foreign('cliente_id')
          ->references('id')->on('clientes');
        $table->integer('produto_id')->unsigned();
        $table->foreign('produto_id')
          ->references('id')->on('produtos');
        $table->integer('quantidade');
        $table->float('total', 8, 2);
        $table->boolean('pago');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
