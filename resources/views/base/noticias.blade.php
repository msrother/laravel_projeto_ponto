@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Notícias</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Imagem da Notícia">
                    <div class="card-body">
                        <h2 class="card-title">Noticia 01</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas semper purus justo, ac semper neque suscipit at. Integer sed eleifend lectus. Praesent euismod nisl ante, eu sagittis est suscipit ut. Proin sed lobortis turpis. Vivamus eleifend lectus sed felis posuere hendrerit. Fusce id augue porttitor, iaculis libero sed, auctor risus. Nam efficitur blandit ex, ut rhoncus sapien elementum ut. Duis eget convallis nibh.</p>
                        <a href="#" class="btn btn-primary">Veja mais...</a>
                    </div>
                    <div class="card-footer text-muted">
                        Enviado dia 01/01/2023
                    </div>
                </div>
                <div class="card mb-4">
                    <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Imagem da Notícia">
                    <div class="card-body">
                        <h2 class="card-title">Noticia 02</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas semper purus justo, ac semper neque suscipit at. Integer sed eleifend lectus. Praesent euismod nisl ante, eu sagittis est suscipit ut. Proin sed lobortis turpis. Vivamus eleifend lectus sed felis posuere hendrerit. Fusce id augue porttitor, iaculis libero sed, auctor risus. Nam efficitur blandit ex, ut rhoncus sapien elementum ut. Duis eget convallis nibh.</p>
                        <a href="#" class="btn btn-primary">Veja mais...</a>
                    </div>
                    <div class="card-footer text-muted">
                        Enviado dia 01/01/2023
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-4">
                    <h5 class="card-header">Pesquisar Notícias</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquise aqui...">
                            <span class="input-group-append">
                                <button class="btn btn btn-primary botao_pesquisa" type="button">Pesquisar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection