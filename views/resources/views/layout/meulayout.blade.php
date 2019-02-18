<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}" >
</head>
<body>

    @hasSection('minha_sessao_produtos')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="width: 500px; margin: 10px;">Produtos</h5>

                <p class="card-text">
                    @yield('minha_sessao_produtos')
                </p>
                <a href="#" class="card-link"> Informacões </a>
                <a href="#" calss="card-link"> Ajuda </a>
            </div>
        </div>
    @endif

    

    <script type="text/javascript" src="{{URL::to('js/app.js')}}"></script>    
</body>
</html>