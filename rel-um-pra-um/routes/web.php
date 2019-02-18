<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    foreach ($clientes as $key => $c) {
        echo "<p>ID: $c->id </p>
              <p>Nome: $c->nome </p>
              <p>Telefone: $c->telefone </p>
              <br>
              <br>
              <p>Rua: ".$c->endereco->rua." </p>
              <p>Endereço: ".$c->endereco->numero." </p>
              <p>Cidade: ".$c->endereco->cidade." </p>
              <p>UF:". $c->endereco->uf." </p>
              <p>CEP: ".$c->endereco->cep." </p>
              <hr>";
    }
});


Route::get('/enderecos', function () {
    $enderecos = Endereco::all();

    foreach ($enderecos as $key => $e) {
        echo "<p>ID Cliente: $e->cliente_id </p>
                <p>Nome:".$e->cliente->nome."</p>
                <p>Telefone: ".$e->cliente->telefone." </p>

              <p>Rua: $e->rua </p>
              <p>Numero: $e->numero </p>
              <p>Bairro: $e->bairro </p>
              <p>Cidade: $e->cidade </p>
              <p>UF: $e->uf </p>
              <p>CEP: $e->cep </p>
              <hr>";
    }
});

Route::get('/inserir', function(){
    $c = new Cliente;
    $c->nome = "José Almeida";
    $c->telefone = "11 95992 1150";
    $c->save();

    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13010-456";

    $c->endereco()->save($e);

    $c = new Cliente;
    $c->nome = "Marcos Silva";
    $c->telefone = "11 95992 1150";
    $c->save();

    $e = new Endereco();
    $e->rua = "Av. do Brasil";
    $e->numero = 1500;
    $e->bairro = "Jd. Olivia";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "13010-457";

    $c->endereco()->save($e);

});

Route::get('/clientes/json', function(){
    //$clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();

    return $clientes->toJson();
});

Route::get('/enderecos/json', function(){
    //$enderecos = Endereco::all();

    $enderecos = Endereco::with(['cliente'])->get();
    //$enderecos = Cliente::with(['endereco'])->get();

    return $enderecos->toJson();
});