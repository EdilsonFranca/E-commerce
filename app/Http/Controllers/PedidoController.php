<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Carrinho;
use App\User;
use App\Carrinhos_produtos;
use Request;

class PedidoController extends Controller{
    public function acompanharPedido(){
        return view('layouts.acompanha-pedido');
    }

    public function adiciona($id){
        $carrinho = Carrinho::create(['usuario_id' => $id, 'formaDePagamento' => session()->get('sacola.formaDePagamento')]);
        if (session()->has('sacola.carr')) :
            foreach (array_chunk(session()->get('sacola.carr'), 4) as $item) :
                Carrinhos_produtos::create(['nome_produto' => $item[0], 'qnt_produto' => $item[1], 'valor_produto' => str_replace(',', '.', str_replace("R$", "", $item[2])), 'carrinho_id' => $carrinho->id]);
            endforeach;
        endif;
        return view('layouts.acompanha-pedido')->with('carrinho', $carrinho);
    }

    public function buscaStatus($id){
        return Carrinho::find($id);
    }

    public function alteraStatus($id){
        $carrinho = Carrinho::find($id);
        if ($carrinho->status == 'Pedido Feito') {
            $carrinho->status = 'Pedido em Preparo';
        } elseif ($carrinho->status == 'Pedido em Preparo') {
            $carrinho->status = 'Pedido sendo enviado';
        } elseif ($carrinho->status == 'Pedido sendo enviado') {
            $carrinho->status = 'entregue';
        } else {
            $carrinho->status = 'entregue';
        }
        $carrinho->save();
        return redirect()->action('PedidoController@atualizarPedido');
    }

    public function receberPedido(){
        return view('receber-pedido');
    }

    public function atualizarPedido(){
        $pedidos = Carrinho::with('Carrinhos_produtos')->with('User')->with('User.endereco')->where('tb_carrinhos.status', '!=', 'entregue')->get();
        return $pedidos;
    }
}
