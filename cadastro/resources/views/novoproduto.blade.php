@extends('layout.app', ["current" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Nome Produto" />

                    <label for="estoqueProduto">Estoque Produto</label>
                    <input type="text" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="Estoque Produto" />

                    <label for="precoProduto">Preço</label>
                    <input type="text" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço Produto" />

                    <label for="categoriaProduto">Categoria</label>
                    <select type="text" class="form-control" name="categoriaProduto" id="categoriaProduto" placeholder="Categoria Produto" />
                        @foreach($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>

                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>

            </form>
        </div>
    </div>
@endsection