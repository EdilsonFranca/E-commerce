<?php

namespace  App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProdutosRequest;
use App\Produto;
use App\Categoria;
use App\Produto_categoria;
use App\Foto;
use App\Cor;
use Request;


class ProdutoController  extends Controller{
  public function __construct()
  { }

  public function listar()
  {
    $produtos = Produto::all();
    return view('produto.listagem-de-produtos')->with('produtos', $produtos);
  }


  public function novo(){
    return view('layout.formulario-produto')->with('categorias', Categoria::all());
  }

  public function adiciona1(ProdutosRequest $request){
    $produto = new Produto(Request::all());
    if ($request->has('photo')) {
      $image = $request->file('photo');
      $name = str_slug($request->input('marca')) . '_' . time();
      $folder = 'images/';
      $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
      $request->photo->move(public_path('images'), $filePath);
      $produto->photo = $filePath;
    }
    $produto->save();
    return redirect()->action('ProdutoController@listar');
  }

  public function adicionaPromocao()
  {
    $id = Request::input('id');
    $valorPromocao = Request::input('valor-promocao');
    $produto = Produto::find($id);
    $produto->preco_promocao = $valorPromocao;
    $produto->save();
    return redirect()->action('ProdutoController@listar');
  }

  public function removePromocao(){
    $id = Request::input('id');
    $produto = Produto::find($id);
    $produto->preco_promocao = NULL;
    $produto->save();
    return redirect()->action('ProdutoController@listar');
  }

  public function detalhe($id)
  {
    $produto = Produto::find($id);
    return view('produto.detalhe')->with('produto', $produto);
  }

  public function adicionaCategoria(){
    $categoria = new Categoria(Request::all());
    $categoria->save();
    return redirect()->action('ProdutoController@novo');
  }

  public function remove($id){
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('ProdutoController@listar');
  }

  public function removeCategoria(){
    $categoria = Categoria::find(Request::input('categoria_id'));
    if (count($categoria->produtos) == 0) {
      $categoria->delete();
      return redirect()->action('ProdutoController@novo');
    } else
      return view('layout.formulario-produto')->with('msn', 'precisa excluir todos produtos com esta categoria')->with('categorias', Categoria::all())->with('tipo', 'danger');
  }

  public function adiciona(ProdutosRequest $request){
    if ($request->input('id')) :
       $produto = Produto::find($request->input('id'));
       $produto->update($request->all());
    else :
       $produto = Produto::create(Request::all());
    endif;

    if ($request->file('photos')) :
       Foto::where('produto_id', $produto->id_produto)->delete();
      foreach ($request->file('photos') as $photo) :
        $name = str_slug(substr($request->input('marca'), 0,10)).'_'.md5(uniqid());
        $folder = 'images/';
        $filePath = $folder . $name . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $filePath);
        Foto::create(['uploadedFiles' => $filePath , 'produto_id' => $produto->id_produto]);
      endforeach;
    endif;

    if ($request->input('cores')) :
      Cor::where('produto_id', $produto->id_produto)->delete();
      foreach ($request->input('cores') as $cor) :
        Cor::create(['nome_cor' => $cor, 'produto_id' => $produto->id_produto]);
      endforeach;
    endif;
    
    if ($request->input('categorias')) :
      Produto_categoria::where('produto_id', $produto->id_produto)->delete();
      foreach ($request->input('categorias') as $categoria) :
        Produto_categoria::create(['categoria_id' => $categoria, 'produto_id' => $produto->id_produto]);
      endforeach;
    endif;

    return redirect()->action('ProdutoController@listar');
  }
}
