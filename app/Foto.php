<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model{
	protected $table ='tbFotos';
	public $timestamps = false;
	protected $fillable  = array('uploadedFiles','produto_id');

	public function produto(){
		return $this->hasOne('App\Produto','id_produto');
	}   
}
