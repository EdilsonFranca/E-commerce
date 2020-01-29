<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foto extends Migration{
    public function up(){
        Schema::create('tbFotos', function (Blueprint $table) {
            $table->bigIncrements('id_foto');
            $table->string('uploadedFiles');
            $table->unsignedBigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id_produto')->on('tb_produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }


   
    public function down(){
        Schema::dropIfExists('tbFotos');
    }
}
