<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto_categoria extends Model{
    protected $table ='tb_produto_categorias';
	public $timestamps = false;
    protected $fillable  = array('categoria_id','produto_id');
}
