@extends('layout.principal-admin')
     @section('conteudo')
     <h3>Listagem de Produtos</h3>
       <!-- inicio modal adiciona promoção-->
       <div class="modal fade" id="ExemploModalCentralizadoAdicionaPromocao" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form class="modal-dialog" role="document" action="/adiciona-promocao" method="POST" >
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="modal-content " id="adiciona-promocao" style="height:100px"></div>
            </form>
        </div>
      <table class="table table-bordered">
         <tr>
            <th> Cod </th>
            <th> Marca  </th>
            <th> Cor  </th>
            <th> Tamanho  </th>
            <th> Qtd  </th>
            <th> Preço </th>
            <th> Preço promoção</th>
            <th> Descricao</th>
            <th> Categoria </th>
            <th> delete </th>
         </tr>
          @foreach ($produtos as $produto)
         <tr>
            <td>{{ $produto->id_produto }} </td>
            <td>{{ $produto->marca  }} </td>
            <td>
                @foreach ($produto->cores as $cor)
                  {{$cor->nome_cor }}     
                 @endforeach
            </td>
            <td>{{ $produto->numero  }} </td>
            <td>{{ $produto->quantidade  }} </td>
            <td>{{ $produto->preco  }} </td>
            <td class="text-center"> 
                @if ($produto->preco_promocao ) {{$produto->preco_promocao}}
                <form action="/remove-promocao" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input  hidden name="id" value="{{$produto->id}}">
                    <button class="btn btn-outline-danger btn-sm">
                        <small>remover</small>
                    </button>
                </form>
                @else <button data-toggle="modal" data-target="#ExemploModalCentralizadoAdicionaPromocao" 
                class="btn btn-outline-primary btn-sm" onclick="modalAdicionaPromocaoController.criaModal({{ $produto->id }},'{{ $produto->nome }}','{{ $produto->preco }}')">
                  <small>adicionar</small>
               </button>
                @endif
            </td>
            <td>{{ $produto->descricao }} </td>
            <td> 
                @foreach ($produto->categoria as $categoria)
                  {{$categoria->nome }}     
                 @endforeach
            </td>
            <td>
             <a href="{{action('ProdutoController@remove', $produto->id_produto)}}">
               <svg class="item‐icone-rodape" style=" width: 40px; height:40px;fill: coral;z-index: 3;position: relative; top: -10px">
                    <use xlink:href="icon-svg/categorias.svg#delete"/>
               </svg>
             </a>
          </td>
         </tr>
         @endforeach
      </table>
      <script src="js/MoneyHelper.js"></script>
      <script src="js/Controller/ModalAdicionaPromocaoController.js"></script>
      <script src="js/models/ModalAdicionaPromocao.js"></script>
      <script src="js/view/ModalAdicionaPromocaoView.js"></script>
      <script>
         modalAdicionaPromocaoController = new ModalAdicionaPromocaoController();
      </script>
      @stop
