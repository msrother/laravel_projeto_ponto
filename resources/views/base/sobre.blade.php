@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gerenciamento de Ponto de Funcionários</title>
  <style>
    /* Estilos CSS para personalizar a página */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    h1 {
      color: #333;
    }
    p {
      color: #744005;
      text-indent: 30px;
    }
    .card-img-top {
      width: 150px; 
      height: auto; 
    margin-left: auto;
    margin-right: auto;
    }
    .card-title {
    text-align: center;
  }
  </style>
</head>

<body>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/ponto.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title">Quem <br> somos?</h1>
              <p class="card-text"> 
                    O Gerenciamento de Ponto de Funcionários "Tudo no Seu Tempo" é uma ferramenta essencial 
                para o controle e organização das atividades relacionadas ao registro de horários de trabalho dos colaboradores. 
                </p>
                <p>Através desse sistema, buscamos promover uma gestão eficiente, garantindo a precisão e a confiabilidade
                 dos registros de ponto.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/ponto.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title">Qual o nosso <br> Objetivo?</h1>
              <p class="card-text">Nosso objetivo é fornecer uma solução que simplifique e automatize o processo 
                de controle de horas trabalhadas, auxiliando tanto os colaboradores quanto os gestores.</p>
                <p>Com o Gerenciamento de Ponto, buscamos proporcionar uma experiência intuitiva e acessível, com recursos
                 personalizados para atender às necessidades específicas de cada setor e nível hierárquico dentro da empresa.
                 </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/ponto.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h1 class="card-title">Como Falar <br> com a Gente?</h1>
              <p class="card-text">Se surgirem dúvidas ou dificuldades, nossa equipe de suporte está disponível 
                para auxiliá-lo e garantir que o Gerenciamento de Ponto seja utilizado de forma eficaz e eficiente.
              </p><br> <p>Contate-nos pelo tudonasuahora@tnsh.com.br</p>
            </div>
          </div>
        </div>
      </div>
</body>
@endsection
