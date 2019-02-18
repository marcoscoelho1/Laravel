<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){
        return "Jose da Silva";
    }

    public function getIdade(){
        return "20 anos";
    }

    public function multiplicar($n1, $n2){
        return $n1 * $n2;
    }

    public function getNomeById($id){
        $v = ["Mario", "Edison", "Roberto", "Jean"];

        if($id >= 0 && $id < count($v)){
            return $v[$id];
        }else{
            return "Valor Inválido";
        }
    }
}
