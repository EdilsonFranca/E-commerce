<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cor extends Migration{
    public function up(){
        Schema::create('tbCor', function (Blueprint $table) {
            $table->bigIncrements('id_cor');
            $table->string('nome_cor');
            $table->unsignedBigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id_produto')->on('tb_produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }


   
    public function down(){
        Schema::dropIfExists('tbCor');
    }
}
