<?php

namespace App\Http\Controllers;
use Request;

class CarrinhoController extends Controller{
   
    public function pagCar($id){
        $carrinho = Carrinho::find($id);
        return view('carrinho')->with('carrinho', $carrinho);
    }

    public function addCar(){
            session()->push('sacola.carr', Request::input('marca'));
            session()->push('sacola.carr', Request::input('numero'));
            session()->push('sacola.carr', Request::input('cor2'));
            session()->push('sacola.carr', Request::input('descricao'));
            session()->push('sacola.carr', Request::input('valor_unitario'));
            session()->push('sacola.carr', Request::input('foto'));
            session()->push('sacola.carr', Request::input('valor'));
            session()->push('sacola.carr', Request::input('quantidade'));
        return view('layout.carrinho');
    }

    public function renoveCar() {
        session()->forget('sacola');
        session()->forget('carr');
        session()->forget('sacola.carr');
        return view('layout.carrinho');
     }
}
