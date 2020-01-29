<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Endereco extends Migration{
    public function up() {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('logradouroTipo', ['Av', 'Rua']);	
            $table->string('logradouroNome');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado',2);
        });
    }

    public function down(){
        Schema::dropIfExists('tb_endereco');
    }
}
