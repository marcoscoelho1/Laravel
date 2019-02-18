@extends('layout.meulayout')

@section('minha_sessao_produtos')
    @if(isset($palavra))
        Palavra: {{$palavra}}
    @endif
@endsection