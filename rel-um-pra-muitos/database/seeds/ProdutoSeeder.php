<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome'=>'Camiseta Polo', 'preco'=>100, 'estoque'=>4, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=>'Calça Jeans', 'preco'=>80, 'estoque'=>5, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=>'Camiseta Manga Longa', 'preco'=>20, 'estoque'=>6, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=>'PC Game', 'preco'=>56, 'estoque'=>7, 'categoria_id'=>2]);
        DB::table('produtos')->insert(
            ['nome'=>'Impressora', 'preco'=>300, 'estoque'=>8, 'categoria_id'=>6]);

        DB::table('produtos')->insert(
            ['nome'=>'Mouse', 'preco'=>25, 'estoque'=>8, 'categoria_id'=>6]);
        
        DB::table('produtos')->insert(
            ['nome'=>'Perfume', 'preco'=>25, 'estoque'=>8, 'categoria_id'=>3]);
            
        DB::table('produtos')->insert(
            ['nome'=>'Cama de Casal', 'preco'=>500, 'estoque'=>2, 'categoria_id'=>4]);
        
        DB::table('produtos')->insert(
            ['nome'=>'Guarda Roupas', 'preco'=>700, 'estoque'=>3, 'categoria_id'=>4]);
    }
}
