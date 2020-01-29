<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Produto extends Model{
    protected $table ='tb_produtos';
    protected $primaryKey = 'id_produto';
    public $timestamps=false;
    protected $fillable = array('id_produto','marca','numero','preco','descricao','quantidade');

    public function categoria(){
        return $this->belongsToMany('App\Categoria', 'tb_produto_categorias','produto_id','categoria_id');
    }
    
    public function fotos(){
        return $this->hasMany('App\Foto', 'produto_id');
    }
    public function cores(){
        return $this->hasMany('App\Cor', 'produto_id');
    }
}