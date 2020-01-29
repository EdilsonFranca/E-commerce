<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Endereco;

class DatabaseSeeder extends Seeder{
 
    public function run(){
        $this->call(CategoriaTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
    }
}
class CategoriaTableSeeder extends Seeder {
    public function run(){
        Categoria::create(['nome' => 'Vestidos']);
        Categoria::create(['nome' => 'Blusas']);
        Categoria::create(['nome' => 'Lingerie']);
        Categoria::create(['nome' => 'Bijuterias']);
        Categoria::create(['nome' => 'Calçados']);
        Categoria::create(['nome' => 'Rasteirinha']);
        Categoria::create(['nome' => 'Bota cano longo']);

    }
}

class EnderecoTableSeeder extends Seeder {
    public function run(){
        Endereco::create(['logradouroTipo' => 'Rua','logradouroNome' => 'freguesia de são','numero' => '565','bairro' => 'itaim Paulista','cep' => '08180-150','cidade' => 'São Paulo','estado' => 'SP']);
    }
}
