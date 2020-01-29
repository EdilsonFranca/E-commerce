@extends('layout.principal-publico')
@section('css')
<link rel="stylesheet" href="assets/css/footer.css">
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/carousel.css">
@stop
@section('conteudo')
<div class="col-sm-12 banner-principal mb-5 " style="background-image: url('banner/shopping.jpg');background-attachment: fixed;background-position: center">
</div>
<div class="top-content">
    <span class="section-title">
        <span class="linha"></span>
        <span class="linha-2 ml-2">Vestidos em Promoção</span>
    </span>
    <div class="container-fluid ">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                @php $subclass = "active"; @endphp
                @foreach ($produtos as $produto)
                <a target="_blank" style="height: 300px" href="{{action('ProdutoController@detalhe', $produto->id_produto)}}" class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 {{$subclass}}">
                    <div class="row mx-1 col-12 px-0  carousel-item-row border border-secondary" style="height: 100%">
                        <img src="{{$produto->fotos[0]->uploadedFiles}}" class="img-carrosel-mult">
                        <span class="p-etiqueta"> <i class="fas fa-tag"></i> <span class="border border-info rounded px-4 bg-info"> R$ {{$produto->preco}}</span></span>
                        <span class="vestido-cores form-inline">
                            @foreach ($produto->cores as $cor)
                            <div class="rounded-circle mx-1" style="background:{{$cor->nome_cor}};width:20px;height:20px "></div>
                            @endforeach
                        </span>
                        <span class="vestido-numero"><small>Tamanho </small> {{$produto->numero}}</span>
                    </div>
                </a>
                @php $subclass = ''; @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="my-5">
    <span class="section-title">
        <span class="linha"></span>
        <span class="linha-2 ml-2">Calçados em destaques</span>
    </span>
    <div class="row">
        @foreach ($calcados as $calcado)
        <a target="_blank" class="col-sm-6"  style="max-height: 300px" href="{{action('ProdutoController@detalhe', $calcado->id_produto)}}" >
            <div class="card" style="width:100%;height:100%">
                <div class="card-body p-0 row" style="width:100%;height:100%">
                    <div class="col-sm-9" style="width:100%;height:100%">
                        <img src="{{$calcado->fotos[0]->uploadedFiles}}" style="width:100%;height:100%">
                    </div>
                    <div class="col-sm-3 mt-2">
                        <ul class="text-left pl-0 mt-2">
                            <li> <span class="mr-2"> Codigo </span>{{$calcado->id}}</li>
                            <li> <span class="mr-2"> Marca </span>{{$calcado->marca}}</li>
                            <li class="form-inline">
                                <span class="mr-2"> Cores </span>
                                @foreach ($calcado->cores as $cor)
                                <div class="rounded-circle mr-1" style="background:{{$cor->nome_cor}};width:20px;height:20px "></div>
                                @endforeach
                            </li>
                            <li> <span class="mr-2"> R$ {{$calcado->preco}}</li>
                            <li>Numero {{$calcado->numero}}</li>
                        </ul>
                    </div>
                </div>
        </div>
        </a>
        @endforeach
    </div>
</div>
<div class="section-bijuterias">
    <span class="section-title">
        <span class="linha"></span>
        <span class="linha-2 ml-2">Bijuterias</span>
    </span>
    <ul class="form-inline d-flex justify-content-center">
        @foreach ( $bijuterias as $bijuteria)
        <a style="background-image: url(' {{$bijuteria->fotos[0]->uploadedFiles}}')" target="_blank" class="li-biju mx-3 p-2 rounded-circle border border-info mx-5" href="{{action('ProdutoController@detalhe', $bijuteria->id_produto)}}" >
        </a>
        @endforeach
    </ul>
</div>
<!-- Javascript -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>
@endsection 
