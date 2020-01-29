<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaRelacionamentoUserEndereco extends Migration{
    public function up(){
        Schema::table('users', function(Blueprint $table){
        $table->unsignedBigInteger('endereco_id'); 
    });
    }

    public function down(){
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('endereco_id');
        });
    }
}
