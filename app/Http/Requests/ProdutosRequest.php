<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest{

    public function authorize(){
        return true;
    }

  
    public function rules(){
        return [
            'marca' => 'required|max:100',
            'descricao' => 'required|max:255',
            'numero' =>'required|max:255',
            'cores' =>'required|max:255',
            'preco' => 'required|numeric',
            'photos' => 'required|max:2048',
            ];
    }

    public function messages(){
        return [
             'required' => 'o campo :attribute  não pode ser vazio.',
        ];
        }
}