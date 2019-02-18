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
use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if(count($cat) === 0){
        echo "<h4> Voce não possui nenhuma categoria cadastrada </h4";
    }else{
        foreach ($cat as $key => $c) {
            echo "<p>".$c->nome ." - ".$c->id."</p>";
        }
    }

});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if(count($prods) === 0){
        echo "<h4> Voce não possui nenhum produto cadastrado </h4";
    }else{
        echo ("<table>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Estoque</td>
                        <td>Preço</td>
                        <td>Categoria</td>
                    </tr>
                </thead>
                <tbody>");

        foreach ($prods as $key => $p) {
            echo "<tr>";
            echo "<td>".$p->nome ." - ".$p->id."</td>";
            echo "<td>".$p->estoque."</td>";
            echo "<td>".$p->preco."</td>";
            echo "<td>".$p->categoria->nome."</td>";
            echo "<tr>";
        }

        echo ("</tbody>
            </table>");
    }

});


Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if(count($cat) === 0){
        echo "<h4> Voce não possui nenhuma categoria cadastrada </h4";
    }else{
        foreach ($cat as $key => $c) {
            echo "<p>".$c->nome ." - ".$c->id."</p>";

            $produtos = $c->produtos;

            if(count($produtos) > 0){
                echo "<ul>";
                foreach($produtos as $p){
                    echo "<li>". $p->nome. "</li>";
                }

                echo "</ul>";
            }
        }
    }

});

Route::get('/categoriasprodutos/json', function () {
    $cat = Categoria::with('produtos')->get();
    return $cat->toJson();

});

Route::get('/adicionarproduto', function () {
    $p = new Produto();
    $c = Categoria::find(1);

    $p->nome = "Meu novo poduto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($c);
    $p->save();

    return $p->toJson();

});

Route::get('/removerprodutocategoria', function () {
    $p =Produto::find(10);
    
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
    }

    return $p->toJson();

});

Route::get('/adicionarproduto/{catid}', function ($catid) {
   
    $c = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Meu novo lkjalkjfla";
    $p->estoque = 10;
    $p->preco = 100;

    if(isset($c)){
        $c->produtos()->save($p);
    }

    $c->load('produtos');

    return $c->toJson();

});