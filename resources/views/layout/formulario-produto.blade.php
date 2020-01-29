@extends('layout.principal-admin')
@section('conteudo')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-8">
        <form class="col-md-12 formulario-adiciona-produtos" action="/produtos/adiciona" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <h3 class="form cols-md-12 text-center">Cadastro de Produtos</h3>
            <div class="form cols-md-12">
                <div class="form-group col-md-12">
                    <label for="inputNome">Marca</label>
                    <input type="text" class="form-control" id="inputNome" value="{{ old('marca') }}" name="marca">
                </div>
                <div class="row mx-0">
                    <div class="form-group col-sm-4">
                        <label for="inputNumeros">numero</label>
                        <input type="text" class="form-control" id="inputNumeros" value="{{ old('numeros') }}" name="numero">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="inputCores1">Cores</label>
                        <div class="row">
                            <input type="color" multiple class="form-control col-sm-3 mx-2" id="inputCores1" value="{{ old('cor[1]') }}" name="cores[]">
                            <input type="color" multiple class="form-control col-sm-3 mx-2" id="inputCores2" value="{{ old('cor[2]') }}" name="cores[]">
                            <input type="color" multiple class="form-control col-sm-3 mx-2" id="inputCores3" value="{{ old('cor[3]') }}" name="cores[]">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="inputPreco">Preço</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                            </div>
                            <input type="text" class="form-control" id="inputPreco" value="{{ old('preco') }}" name="preco">
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="form-group col-md-8">
                        <label for="inputcategoria">Categoria</label>
                        <select class="form-control" id="inputcategoria" value="{{ old('categoria_id') }}" name="categorias[]" multiple>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id_categoria}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="textarea-descricao">Quantidade</label>
                        <input class="form-control" type="number" name="quantidade" value="{{ old('quantidade') }}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputfoto">Foto do Produto</label>
                    <input type="file" class="form-control" value="{{ old('photo') }}" name="photos[]" multiple  id="inputfoto">
                </div>
                <div class="form-group col-md-12">
                    <label for="textarea-descricao">Descrição</label>
                    <textarea class="form-control" id="textarea-descricao" value="{{ old('descricao') }}" name="descricao"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <p class="text-{{ $tipo ?? '' }}"><small> {{ $msn ?? '' }}</small></p>
        <form style="margin-top:100px" action="{{action('ProdutoController@removeCategoria')}}" method="POST" class="form-inline col-12">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <small>Remover Categoria</small>
            <select class="form-control col-9" id="" name="categoria_id">
                @foreach($categorias as $categoria)
                   <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
            <button type="submit" style="padding:1px; border-radius: 0 30px 30px 0;" class="col-3 bg-danger">
                <svg class="item‐icone-rodape" style=" width: 50px; height:32px;fill: #fff">
                    <use xlink:href="../icon-svg/categorias.svg#delete" />
                </svg>
            </button>
        </form>
        <form style="margin-top:50px" action="{{action('ProdutoController@adicionaCategoria')}}" method="POST" class="form-inline col-12">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <small>Adicionar Categoria</small>
            <input type="text" class="form-control col-md-9" name="nome" required>
            <button style="border-radius: 0 30px 30px 0;" type="submit" class="btn btn-success col-3">adicionar</button>
        </form>
    </div>
</div>
</div>
@stop