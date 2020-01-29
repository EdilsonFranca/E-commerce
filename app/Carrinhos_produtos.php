<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinhos_produtos extends Model{
    protected $table ='tb_carrinhos_produtos';
    public $timestamps = false;
    protected $fillable = array('id','nome_produto','qnt_produto','valor_produto','carrinho_id');

    public function Carrinhos(){
		return $this->hasOne('App\Carrinho');
	}   
}
