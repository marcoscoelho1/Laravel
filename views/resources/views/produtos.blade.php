<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
    @if(isset($produtos))
        <h1>Temos produtos</h1>

        @foreach($produtos as $p)
            <p>Nome: {{$p}}</p>
        @endforeach
    @else
        <h1>Variavel produtos não foi passada como parâmetro</h1>
    @endif


    <script type="text/javascript" src="{{URL::to('js/app.js')}}"></script>    
</body>
</html>