@extends('layout.app', ['current' => 'produto', 'current' => 'categoria'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos/{{$produto->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" value="{{$produto->nome}}" placeholder="Nome Produto" />

                    <label for="estoqueProduto">Estoque Produto</label>
                    <input type="text" class="form-control" name="estoqueProduto" value="{{$produto->estoque}}" id="estoqueProduto" placeholder="Estoque Produto" />

                    <label for="precoProduto">Preço</label>
                    <input type="text" class="form-control" name="precoProduto" value="{{$produto->preco}}" id="precoProduto" placeholder="Preço Produto" />

                    <label for="categoriaProduto">Categoria</label>
                    <select type="text" class="form-control" name="categoriaProduto" id="categoriaProduto" placeholder="Categoria Produto" />
                        @foreach($categoria as $cat)
                            <option value="{{$cat->id}}" @if($cat->id == $produto->categoria_id) selected @endif>{{$cat->nome}}</option>

                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>

            </form>
        </div>
    </div>


@endsection