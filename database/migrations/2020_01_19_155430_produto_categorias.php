<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoCategorias extends Migration{
    public function up(){
        Schema::create('tb_produto_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table->unsignedBigInteger('produto_id')->unsigned();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('categoria_id')->references('id_categoria')->on('tb_categorias')->onDelete('cascade');
            $table->foreign('produto_id')->references('id_produto')->on('tb_produtos')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['categoria_id','produto_id']);
        });
    }
    public function down(){
        Schema::dropIfExists('tb_produto_categorias');
    }
}
