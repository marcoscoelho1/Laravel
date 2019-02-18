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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
    $cats = DB::table('categorias')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');

    foreach($nomes as $nome){
        echo "$nome <br>";
    }

    echo "<hr>";

    $cats = DB::table('categorias')->where('id', 1)->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    $c = DB::table('categorias')->where('id', 2)->first();

    echo "id: ". $c->id."; ";
    echo "Nome: ". $c->nome."<br>";

    echo "<hr>";

    echo "<p>Retorna um array utilizando like</p>";

    $cats = DB::table('categorias')->where('nome', 'like', '%p%')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";

    $cats = DB::table('categorias')->where('id',1)->orWhere('id', 2)->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>intervalos</p>";

    $cats = DB::table('categorias')->whereBetween('id',[1,2])->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>intervalos negados</p>";

    $cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>Conjuntos</p>";

    $cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>Conjuntos Negados</p>";

    $cats = DB::table('categorias')->whereNotIn('id',[1,3,4])->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
        
    }

    echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";

    $cats = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'Roupas']
    ])->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>Ordenação por nome</p>";

    $cats = DB::table('categorias')->orderBy('nome')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    echo "<p>Ordenação por nome(decrescente)</p>";

    $cats = DB::table('categorias')->orderBy('nome', 'desc')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }


    
    

});

Route::get('/novascategorias', function(){
    $id = DB::table('categorias')->insertGetId(
            ['nome'=>'Carros']
        );
    
    echo "Novo id = $id <br>";
});


Route::get('/atualizandocategorias', function(){
    echo "<hr>";

    $c = DB::table('categorias')->where('id', 1)->first();

    echo "<p>Antes da atualização </p>";
    echo "id: ". $c->id."; ";
    echo "Nome: ". $c->nome."<br>";

    $c = DB::table('categorias')->where('id', 1)
        ->update(['nome'=>'Roupas infantis']);

        $c = DB::table('categorias')->where('id', 1)->first();

        echo "<p>Depois da atualização </p>";
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";

});

Route::get('/removendocategorias', function(){
    echo "Antes da remoção<br>";
    
    $cats = DB::table('categorias')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";

    //$cats = DB::table('categorias')->where('id', 1)->delete();

    $cats = DB::table('categorias')->whereNotIn('id', [1,2,3,4,5,6])->delete();

    echo "Depois da remoção<br>";
    
    $cats = DB::table('categorias')->get();

    foreach($cats as $c){
        echo "id: ". $c->id."; ";
        echo "Nome: ". $c->nome."<br>";
    }

    echo "<hr>";
});



