<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function listar(){
        $produtos = [
            "Notebook Asus 17 16GB",
            "Mouse e Teclado",
            "Monitor 21 - Samsung",
            "Impressora HP",
            "Disco SSD 512 GB"
        ];

        return view('produtos', compact('produtos'));
    }

    public function sessaoprodutos($palavra){
        return view('sessao_produtos', compact('palavra'));
    }

    public function mostrarOpcoes(){
        return view('mostrar_opcoes');
    }

    public function opcoes($opcao){
        return view('opcoes', compact('opcao'));
    }

    public function loopFor($n){
        return view('loop_for', compact('n'));

    }

    public function loopForeach(){
        $produtos = [
            ["id" => 1, "nome"=>"computador"],
            ["id" => 2, "nome"=>"mouse"],
            ["id" => 3, "nome"=>"impressora"],
            ["id" => 4, "nome"=>"monitor"],
            ["id" => 5, "nome"=>"teclado"]
        ];

        return view('foreach', compact('produtos'));
    }
}
