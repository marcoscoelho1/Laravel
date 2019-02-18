<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meu Título - @yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
        @section('barralateral')
            <p>Essa é a sessão do template é do pai</p>
        @show
    <div>
        @yield('conteudo')
    </div>
</body>
</html>