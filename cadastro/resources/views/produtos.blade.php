@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card">
        <div class="card-body">
            <h5>Cadastro de Produtos</h5>
            
           
                <table class="table table-ordered table-hover" id="tbProdutos">
                    <thead>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Quantidade</td>
                        <td>Preço</td>
                        <td>Categoria</td>
                        <td>Ações</td>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>

           
        </div>
        <div class="card-footer">
            <button href="/produtos/novo" onclick="novoProduto();" class="btn btn-sm btn-primary" role="button"> Novo Produto </button>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProdutos">
                    <div class="modal-header">
                        <h5 class="modal-title"> Novo Produto </h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="idProduto" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto">Nome Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Nome Produto" />
                            </div>
                            
                            <label for="estoqueProduto">Estoque Produto</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="Estoque Produto" />
                            </div>

                            <label for="precoProduto">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço Produto" />
                            </div>

                            <label for="categoriaProduto">Categoria</label>
                            <div class="input-group">
                                <select type="text" class="form-control" name="categoriaProduto" id="categoriaProduto">
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> Salvar </button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss> Cancelar </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            }
        });

        function novoProduto(){
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#estoqueProduto').val('');
            $('#dlgProdutos').modal();

            //carregarCategorias();
        }

        function carregarCategorias(){
            $.getJSON('/api/categorias', function(data){
                for(i=0; i < data.length; i++){
                    opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';

                    $('#categoriaProduto').append(opcao);
                }
            });
        }

        function carregarProdutos(){
            $.getJSON('/api/produtos', function(produtos){
                produtos.map(function(p){
                    linha = `
                        <tr>
                            <td>${p.id}</td>
                            <td>${p.nome}</td>
                            <td>${p.estoque}</td>
                            <td>${p.preco}</td>
                            <td>${p.categoria_id}</td>
                            <td>
                                <button class="btn btn-xs btn-primary" onclick="editar(${p.id})">Editar</button>
                                <button class="btn btn-xs btn-danger" onclick="remover(${p.id})">Apagar</button>
                            </td>
                        </tr>
                    `;

                    $('#tbProdutos>tbody').append(linha);
                })
            })
        }

        function editar(id){
            $.getJSON('/api/produtos/'+id, function(data){
                $('#idProduto').val(data.id);
                $('#nomeProduto').val(data.nome);
                $('#precoProduto').val(data.preco);
                $('#estoqueProduto').val(data.estoque);
                $('#categoriaProduto').val(data.categoria_id);
                $('#dlgProdutos').modal();
            });
        }

        function remover(id){
            $.ajax({
                type: "delete",
                url: "/api/produtos/" + id,
                context: this,
                success: function(){
                    console.log("Apagou Ok");
                    linhas = $("#tbProdutos>tbody>tr");
                    e = linhas.filter(function(i, elemento){ return elemento.cells[0].textContent == id});

                    if(e){
                        e.remove();
                    }
                   
                },
                error: function(error){
                    console.log(error)
                }
            })
        }
        
        $('#formProdutos').submit(function(event){
            event.preventDefault();
            
            if($("#idProduto").val() != ''){
                salvarProduto();
            }else{
                criarProduto();
            }
            
        });

        function salvarProduto(){
            prod = new Object();
            prod.id = $('#idProduto').val();
            prod.nomeProduto = $('#nomeProduto').val();
            prod.estoqueProduto = $('#estoqueProduto').val();
            prod.precoProduto = $('#precoProduto').val();
            prod.categoriaProduto = $('#categoriaProduto').val();

             $.ajax({
                type: "PUT",
                url: "/api/produtos/" + prod.id,
                context: this,
                data: prod,
                success: function(){
                    console.log("Salvou Ok");
                    
                   
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        function criarProduto(){
            prod = new Object();

            prod.nomeProduto = $('#nomeProduto').val();
            prod.estoqueProduto = $('#estoqueProduto').val();
            prod.precoProduto = $('#precoProduto').val();
            prod.categoriaProduto = $('#categoriaProduto').val();

            $.post('/api/produtos', prod, function(data){
                console.log(data);

                $('#tbProdutos>tbody').html('');
                $('#dlgProdutos').modal('hide');
                carregarProdutos();

            })

        }


        $(function(){
            carregarCategorias();
            carregarProdutos();
        })

    </script>
@endsection