<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContatoRequest;
use Request;
use Mail;

use App\Http\Controllers\Controller;

class EmailController extends Controller {
      public function sendEMail(ContatoRequest $request){
        $nome = Request::input('nome');
        $telefone = Request::input('telefone');
        $email = Request::input('email');
        $mensagem = Request::input('mensagem');

        Mail::send('emails.send', ['nome' => $nome, 'telefone' => $telefone, 'email' => $email, 'mensagem' => $mensagem], function ($message){
            $message->from('edilson18martins@gmail.com', 'Edilson França');
            $message->to('edilson18martins@gmail.com');
        });
        if (!Mail::failures())
           return view('layouts.fale-conosco')->with('msn','Email enviado com sucesso  !')->with('tipo','success');
           return view('layouts.fale-conosco')->with('msn','Falha ao enviar !')->with('tipo','dange');
   }
  
}