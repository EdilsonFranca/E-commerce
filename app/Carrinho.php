<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model{
    protected $table = 'tb_carrinhos';
    public $timestamps = false;
    protected $fillable = array('id_carrinho', 'status','formaDePagamento','usuario_id','caixa_id');

    public function Carrinhos_produtos() {
        return $this->hasMany('App\Carrinhos_produtos', 'carrinho_id');
    }

    public function User(){
        return $this->belongsTo('App\User','usuario_id');
    }
}
