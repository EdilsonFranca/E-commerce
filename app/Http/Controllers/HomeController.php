<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Request;
use App\Produto;
use App\Categoria;
class HomeController extends Controller{

    public function index(){
      $produtos=Produto::take(10)->get();
      $calcados=Produto::join("tb_produto_categorias","tb_produtos.id_produto","=","tb_produto_categorias.produto_id")->where('categoria_id', 5)->take(2)->get();
      $bijuterias=Produto::join("tb_produto_categorias","tb_produtos.id_produto","=","tb_produto_categorias.produto_id")->where('categoria_id', 4)->take(6)->get();
      return view('home')->with('produtos',$produtos)->with('calcados',$calcados)->with('bijuterias',$bijuterias);
    }

    public function detalhe($id){
      $produto = Produto::find($id);
      return view('produto.detalhe')->with('produto', $produto);
    }

}
