<?php

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/fale-conosco', 'FaleConoscoController@pag');
Route::get('/sobre-nos', 'SobreNosController@pag');
Route::get('/produtos','ProdutoController@listar');
Route::get('/produtos/novo','ProdutoController@novo');
Route::get('/produto/detalhe/{id}','ProdutoController@detalhe');
Route::post('/produtos/adiciona','ProdutoController@adiciona');
Route::get('/produtos/remove/{id}','ProdutoController@remove')->where('id', '[0-9]+');

Route::get('/busca-categoria/{id}', 'HomeController@busca_por_categoria')->where('id', '[0-9]+');
Route::post('/adiciona-promocao', 'ProdutoController@adicionaPromocao');
Route::post('/remove-promocao', 'ProdutoController@removePromocao');
Route::post('/remove-categoria', 'ProdutoController@removeCategoria');
Route::post('/produtos/adiciona-categoria', 'ProdutoController@adicionaCategoria');

Route::get('session/get','SessionController@accessSessionData');
Route::post('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

Route::post('sessionFormaDePagamento/set','SessionController@storeSessionDataformaDePagamento');
Route::post('send-email', 'EmailController@sendEMail');
Route::post('adicionar-carrinho', 'CarrinhoController@addCar');
Route::get('/busca-carrinho/{id}', 'CarrinhoController@pagCar')->where('id', '[0-9]+');
Route::get('/limpa-carrinho', 'CarrinhoController@renoveCar');

