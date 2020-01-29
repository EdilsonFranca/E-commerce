<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    protected $table ='tb_categorias';
    protected $primaryKey = 'id_categoria';
	public $timestamps = false;
    protected $fillable  = array('id_categoria','nome');

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'tb_produto_categorias', 'categoria_id','produto_id');
    }
}
