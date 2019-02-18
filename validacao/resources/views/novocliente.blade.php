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
                        <form action="/cliente" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente </label>
                                <input type="text" id="nome" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}">
                                @if($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nome')}}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do Cliente </label>
                                <input type="number" id="idade" name="idade" class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}">
                                @if($errors->has('idade'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('idade')}}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço do Cliente </label>
                                <input type="text" id="endereco" name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}">
                                @if($errors->has('endereco'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('endereco')}}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="email">Email do Cliente </label>
                                <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </main>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>