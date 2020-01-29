<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest{

    public function authorize(){
        return true;
    }

  
    public function rules(){
        return [
            'nome' => 'required|max:100',
            'telefone' => 'required|max:100',
            'email' => 'required|max:100',
            'mensagem' => 'required',
            ];
    }

    public function messages(){
        return [
             'required' => 'o campo :attribute  não pode ser vazio.',
        ];
        }
}
