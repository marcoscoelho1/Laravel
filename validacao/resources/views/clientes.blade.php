<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Novo Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body>
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tabelaprodutos">
                            <thead>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Endereço</th>
                                <th>E-mail</th>
                            </thead>
                            <tbody>
                                @foreach($clientes as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->nome}}</td>
                                        <td>{{$c->idade}}</td>
                                        <td>{{$c->endereco}}</td>
                                        <td>{{$c->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>


                </div>
            </div>

        </div>
    </main>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>