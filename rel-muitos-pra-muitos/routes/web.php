<?php

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedores as $key => $d) {
       echo "<p>Nome: ".$d->nome."</p>";
       echo "<p>Cargo: ".$d->cargo."</p>";

       if(count($d->projetos) > 0){
           echo "Projetos: <br>";
           echo "<ul>";
            foreach ($d->projetos as $key => $p) {
                echo "<li>Nome: ".$p->nome." | ".$p->estimativa_horas." | ".$p->pivot->horas_semanais."</li>";
            }
           echo "</ul>";
       }
       echo "<hr>";
    }
    return $desenvolvedores->toJson();

});


Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    /*
    foreach ($projeto as $key => $d) {
       echo "<p>Nome: ".$d->nome."</p>";
       echo "<p>Cargo: ".$d->cargo."</p>";

       if(count($d->projetos) > 0){
           echo "Projetos: <br>";
           echo "<ul>";
            foreach ($d->projetos as $key => $p) {
                echo "<li>Nome: ".$p->nome." | ".$p->estimativa_horas." | ".$p->pivot->horas_semanais."</li>";
            }
           echo "</ul>";
       }
       echo "<hr>";
    }
    */

    return $projetos->toJson();

});

Route::get('/alocar', function () {
    $proj = Projeto::find(4);
    
    if(isset($proj)){
        $proj->desenvolvedores()->attach(1, ['horas_semanais' => 50]);
    }


});

Route::get('/desalocar', function () {
    $proj = Projeto::find(4);
    
    if(isset($proj)){
        $proj->desenvolvedores()->detach([1]);
    }


});
