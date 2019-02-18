<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }
});

Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();

    return redirect('/');
});

Route::get('categoria/{id}', function($id){
    $cat = Categoria::find($id);
    if (isset($cat)) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }else{
        echo "<h1>Categoria não encontrada";
    }

});

Route::get('atualizar/{id}/{nome}', function($id, $nome){
    $cat = Categoria::findOrFail($id);
    
    $cat->nome = $nome;

    $cat->save();

    return redirect('/');
    
});

Route::get('remover/{id}', function($id){
    $cat = Categoria::findOrFail($id);

    $cat->delete();
    
    return redirect('/');
    
});

Route::get('categoriapornome/{nome}', function($nome){
    $categorias = Categoria::where('nome', $nome)->get();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }
    
});

Route::get('idmaiorque/{id}', function($id){
    $categorias = Categoria::where('id','>=', $id)->get();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }
    
});

Route::get('ids123', function(){
    $categorias = Categoria::whereIn('id',[1,2,3])->get();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }
    
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome;

        if($cat->trashed()){
            echo '(apagado)<br>';
        }else{
            echo '<br>';
        }
    }
});

Route::get('ver/{id}', function($id){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::withTrashed()->where('id', $id)->first();

    if (isset($cat)) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome.'<br>';
    }else{
        echo "<h1>Categoria não encontrada";
    }

});

Route::get('/somenteapagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();

    foreach ($categorias as $key => $cat) {
        echo "id: ". $cat->id.', ';
        echo "Nome: ". $cat->nome;

        if($cat->trashed()){
            echo '(apagado)<br>';
        }else{
            echo '<br>';
        }
    }
});

Route::get('restaurar/{id}', function($id){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::withTrashed()->where('id', $id)->first();

    if (isset($cat)) {
        $cat->restore();
        echo "Categoria restaurada: ". $cat->id.'<br>';
        echo "<a href=\"/\">Listar Todas</a>";
    }else{
        echo "<h1>Categoria não encontrada";
    }

});

Route::get('apagarpermanente/{id}', function($id){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::withTrashed()->where('id', $id)->first();

    if (isset($cat)) {
        $cat->forceDelete();
        return redirect('/todas'); 
    }else{
        echo "<h1>Categoria não encontrada";
    }

});

