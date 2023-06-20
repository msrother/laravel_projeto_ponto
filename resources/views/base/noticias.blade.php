@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Notícias</h1>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <img class="card-img-top" src="images/noticia1.jpg" alt="Imagem da Notícia">
                    <div class="card-body">
                        <h2 class="card-title">Importância do relógio de ponto em pequenas e médias empresas</h2>
                        <p class="card-text">Grande parte das ações judiciais na justiça do trabalho envolvem inconsistências registro de ponto, como horas extras não pagas, por exemplo. Quando a empresa realiza o registro manual ou não possui registro, é muito difícil comprovar que não há irregularidades.

                            Contar com um relógio de ponto diminui as chances de um funcionário ingressar na justiça e, quando isso acontece, é muito mais fácil comprovar os dados, pois os dados ficam registrados para consultas posteriores.</p>
                        <a href="https://kl-quartz.com.br/importancia-do-relogio-de-ponto-em-pequenas-e-medias-empresas/#:~:text=O%20rel%C3%B3gio%20de%20ponto%20serve,envio%20de%20informa%C3%A7%C3%B5es%20ao%20eSocial." class="btn btn-primary">Veja mais</a>
                    </div>
                    <div class="card-footer text-muted">
                        Enviado dia 08/11/2018
                    </div>
                </div>
                <div class="card mb-4">
                    <img class="card-img-top" src="images/noticia2.jpg" alt="Imagem da Notícia">
                    <div class="card-body">
                        <h2 class="card-title">O que é um sistema de registro de ponto?</h2>
                        <p class="card-text">
                            Um sistema de registro de ponto serve para lançar as entradas e saídas dos colaboradores de uma empresa, para o controle da jornada de trabalho.
                            
                            Basicamente, existem quatro tipos de sistemas, que são: manual, mecânico, eletrônico e digital. Cada um tem suas especificidades, mas se adaptam a todo tipo de empresa, dependendo das necessidades de cada empregador.</p>
                        <a href="https://www.pontotel.com.br/importancia-do-registro-de-ponto/" class="btn btn-primary">Veja mais</a>
                    </div>
                    <div class="card-footer text-muted">
                        Enviado dia 30/03/2023
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