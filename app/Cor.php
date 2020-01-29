<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model{
	protected $table ='tbCor';
	public $timestamps = false;
	protected $fillable  = array('nome_cor','produto_id');

	public function produto(){
		return $this->hasOne('App\Produto','id');
	}   
}
