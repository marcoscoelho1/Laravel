<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}" /> -->
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}" />
</head>
<body>
     <!-- <script src="{{asset('js/app.js')}}" type="text/javascript"></script> -->
     <script src="{{URL::to('js/app.js')}}" type="text/javascript"></script>

     @component('components.meucomponente', ['tipo'=>'danger'])
        <strong> Erro: </strong> Sua mensagem de erro

        @slot('titulo')
            Erro fatal
        @endslot
     @endcomponent

     @alerta(['tipo'=>'success'])
        <strong> Erro: </strong> Sua mensagem de erro2

        @slot('titulo')
            Erro info
        @endslot
     @endalerta

     @alerta(['tipo'=>'danger'])
        <strong> Erro: </strong> Sua mensagem de erro

        @slot('titulo')
            Erro fatal
        @endslot
     @endalerta
    
</body>
</html>