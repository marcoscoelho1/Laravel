<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <style>
        body{
            padding: 20px;
        }

        .navbar{
            margin-bottom: 20px;
        }
    </style>
    
</head>
<body>
    <div class="container">
        @component('component_navbar', ['current'=> $current])
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @hasSection('javascript')
        @yield('javascript')
    @endif
    
</body>
</html>