<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categoria extends Migration{

    public function up(){
        Schema::create('tb_categorias', function (Blueprint $table) {
            $table->bigIncrements('id_categoria');
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tb_categorias');
    }
}
