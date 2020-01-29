<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carrinhos extends Migration{

    public function up(){
        Schema::create('tb_carrinhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['Pedido Feito', 'Pedido em Preparo','Pedido sendo enviado','entregue'])->default('Pedido Feito');
            $table->enum('formaDePagamento', ['Dinheiro troco para 20','Dinheiro troco para 50','Dinheiro troco para 100', 'Cartao','On-line']);
            $table->unsignedBigInteger('usuario_id')->unsigned();
            $table->unsignedBigInteger('caixa_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('caixa_id')->references('id_caixa')->on('tb_caixas')->onDelete('cascade');
        });
    }

    public function down(){
        Schema::dropIfExists('tb_carrinhos');
    }
}
