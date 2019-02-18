@extends('layout.app')

@section('titulo', 'Minha página -Filho')

@section('conteudo')
    <p>Este é o conteudo do filho</p>
@endsection

@section('barralateral')
    <p>Essa parte é do filho</p>
    @parent
@endsection