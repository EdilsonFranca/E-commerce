@extends('layout.principal-publico')
@section('css')

<link rel="stylesheet" href="assets/css/carrinho.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/footer.css">

@stop
@section('conteudo')
<div class="col-12 row" style="min-height: 301px">
    <section class="col-sm-8">
        @if(!session()->has('sacola.carr'))
        <h3 class="text-center">seu Carrinho esta vazio :(</h3>
        @else
        <h3>seu Carrinho</h3>
        <div class="row mt-2">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col">Tamanho</td>
                            <td class="px-3" scope="col">PREÇO</td>
                            <td scope="col">Cor</td>
                            <td scope="col">Qtd</td>
                            <td scope="col">SUBTOTAL</td>
                        </tr>
                    </thead>
                    @if(session()->has('sacola.carr'))
                    @foreach (array_chunk(session()->get('sacola.carr'),8) as $item)
                    <tbody class="mt-3" style="font-family: 'Josefin Sans', sans-serif;font-weight: 400;">
                        <tr class="">
                            <td class="foto-carrinho"><img src="{{$item[5]}}" alt=""></td>
                            <td> {{$item[0]}}</td>
                            <td> {{$item[3]}} </td>
                            <td> {{$item[1]}}</td>
                            <td> R$ {{$item[4]}} </td>
                            <td> <span class="btn-sm rounded-circle" style="background: {{$item[2]}};width:20px;height:20px; "> </span></td>
                            <td> {{$item[7]}} </td>
                            <td class="sub-valor-total-td">{{$item[6]}} </td>
                        </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>

            </div>
        </div>
        @endif
    </section>
    <div class="col-sm-4">
        <div class="box-lateral-finalizar mt-5 sticky-top">
            <p class="mt-4 ml-2">
                SUBTOTAL R$ <span class="sub-valor-total text-info mx-3"></span>
            </p>
            <p class="ml-2">
                VALOR TOTAL R$<span class="valor-total text-danger mx-3"></span>
            </p>
            <p class="text-center">
                <button type="button" class="btn btn-outline-dark px-4 btn-sm mx-2">Finalizar pedido</button>
                <a class="text-info mx-2 limpar-carrinho" href="/limpa-carrinho">limpar Carrinho</a>
            </p>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        let list = document.querySelectorAll('.sub-valor-total-td');
        let spanSubValoTotal = document.querySelector('.sub-valor-total');
        let spanValoTotal = document.querySelector('.valor-total');
        let cont = 0;
        list.forEach((e, i) => {
            cont += parseFloat(e.textContent);
        })
        spanSubValoTotal.innerHTML = cont.toFixed(2);
        spanValoTotal.innerHTML = cont.toFixed(2);
    };
</script>
@endsection 