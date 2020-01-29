<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarrinhosProdutos extends Migration{
    public function up(){
        Schema::create('tb_carrinhos_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_produto');
            $table->integer('qnt_produto');
            $table->decimal('valor_produto', 9, 2);
            $table->unsignedBigInteger('carrinho_id')->unsigned();
            $table->foreign('carrinho_id')->references('id')->on('tb_carrinhos')->onDelete('cascade');
        });
    }


    public function down(){
        Schema::dropIfExists('tb_carrinhos_produtos');
    }
}
