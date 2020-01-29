@extends('layout.principal-publico')
@section('css')
<link rel="stylesheet" href="/assets/css/detalhe.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="assets/css/footer.css">
@stop
@section('conteudo')
<div class="row mt-5">
    <div class="col-sm-7">
        <div class="container row">
            <div class="col-2">
                @foreach ($produto->fotos as $indice => $foto)
                <div class="column">
                    <img class="demo cursor" src="/{{$foto->uploadedFiles}}" style="width:100%" onclick="currentSlide({{$indice +1}})">
                </div>
                @endforeach
            </div>
            <div class="col-10">
                @foreach ($produto->fotos as $indice => $foto)
                <div class="mySlides">
                    <img src="/{{$foto->uploadedFiles}}" style="width:100%">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="col-10 px-0 border border-secondary rounded ">
            <table class="table table-striped ">
                <tbody>
                    <tr class="">
                        <td>Marca</td>
                        <td> {{$produto->marca}}</td>
                    </tr>
                    <tr class="">
                        <td> Numero</td>
                        <td>{{$produto->numero}}</td>
                    </tr>
                    <tr class="">
                        <td> Descrição</td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr class="">
                        <td> Cores</td>
                        <td>
                            <span class="mr-2 form-inline">
                                @for ($i = 0; $i < count($produto->cores); $i++)
                                    <li class="item d-inline text-success mx-1 ">
                                        <input hidden name="cor" type="radio" id="cor{{$i}}" value="{{$produto->cores[$i]->nome_cor}}">
                                        <label for="cor{{$i}}" class="btn-sm rounded-circle" style="background:{{$produto->cores[$i]->nome_cor}};width:20px;height:20px; "></label>
                                    </li>
                                @endfor
                                <span class="cor-selecionada msn text-danger ml-2"></span>
                            </span>
                        </td>
                    </tr>
                    <tr class="">
                        <td> Valor R$ </td>
                        <td> <span class="text-danger valor-unitario">{{$produto->preco}}</span></td>
                    </tr>
                    <tr class="">
                        <td style="width: 120px">Valor total R$</td>
                        <td> <span class="text-danger valor-total">{{$produto->preco}}</span> </td>
                    </tr>
                    <tr class="">
                        <td> Quantidade</td>
                        <td class="form-inline mr-0">
                            <div class="rounded-circle  btn btn-outline-info btn-sm btn-declements" onclick="decrements()">-</div>
                            <span id="quantidade-modal" class="form-control quantidade-modal col-3">1</span>
                            <div class="rounded-circle   btn btn-outline-primary btn-sm btn-inclements" onclick="increments()">+</div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="">
                        <td class="px-0" colspan="2">
                            <form action="/adicionar-carrinho" id="formulario-session" method="post">
                                @csrf
                                <input type="hidden" name="marca" value="{{$produto->marca}}">
                                <input type="hidden" name="numero" value="{{$produto->numero}}">
                                <input type="hidden" name="cor2" class="cor2">
                                <input type="hidden" name="descricao" value="{{$produto->descricao}}">
                                <input type="hidden" name="valor_unitario" value="{{$produto->preco}}">
                                <input type="hidden" name="foto" value="{{$produto->fotos[0]->uploadedFiles }}">
                                <input type="hidden" name="valor" class="valor-total-input" value="{{$produto->preco}}">
                                <input type="hidden" name="quantidade" class="quantidade-modal-input" value="1">
                                <button type="submit" class="btn btn-primary btn-block mt-3">Comprar</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="redes-sociais mx-auto">
                        <td colspan="2" class="text-center">
                            <i class="fab fa-facebook-f px-1"> </i>
                            <i class="fab fa-instagram px-1"> </i>
                            <i class="fab fa-whatsapp px-1"></i>
                            <i class="fab fa-facebook-messenger px-1"></i>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    <script>
        function increments() {
            let qtd = document.querySelector('.quantidade-modal');
            if (qtd.textContent <= 30) {
                let valor = parseFloat(document.querySelector('.valor-unitario').textContent);
                let valor_total = document.querySelector('.valor-total');
                let cont = parseInt(qtd.textContent);
                cont++;
                qtd.innerHTML = cont;
                let valo_alterado = parseFloat(valor_total.textContent) + parseFloat(valor);
                valor_total.innerHTML = valo_alterado.toFixed(2);
                document.querySelector('.valor-total-input').value = valo_alterado.toFixed(2);
                document.querySelector('.quantidade-modal-input').value = cont;
            }
        }

        function decrements() {
            let qtd = document.querySelector('.quantidade-modal');
            if (qtd.textContent > 1) {
                let valor = parseFloat(document.querySelector('.valor-unitario').textContent);
                let valor_total = document.querySelector('.valor-total');
                let cont = parseInt(qtd.textContent);
                cont--;
                qtd.innerHTML = cont;
                let valo_alterado = parseFloat(valor_total.textContent) - parseFloat(valor);
                valor_total.innerHTML = valo_alterado.toFixed(2);
                document.querySelector('.valor-total-input').value = valo_alterado.toFixed(2);
                document.querySelector('.quantidade-modal-input').value = cont;
            }
        }
    </script>
    <script>
        let form = document.querySelector('#formulario-session');
        form.addEventListener('submit', function(evt) {
            let cor = null;
            cor = document.querySelector('input[name="cor"]:checked');

            if (cor == null) {
                document.querySelector('.msn').innerHTML = 'escolha uma cor';
                evt.preventDefault();
            } else {
                document.querySelector('.cor2').value = cor.value;
            }

        });
    </script>
    <!-- Javascript -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="js/sessions.js"></script>
    <script src="assets/js/scripts.js"></script>
    @endsection 
