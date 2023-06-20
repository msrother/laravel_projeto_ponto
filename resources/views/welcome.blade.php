<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Projeto Final</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;1,500&display=swap');

            body {
                height: 100vh;
                background: linear-gradient(120deg, #FFFACD, #FFDAB9);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            a {
                text-decoration: none;
                color: inherit;
            }

            .relogio {
                margin: 0;
                padding: 0;
                font-family: 'Montserrat', sans-serif;
                display: flex;
                align-items: center;
                justify-content: space-around;
                height: 200px;
                width: 550px; 
            }

            .relogio div{
                height: 170px;
                width: 150px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                font-size: 25px;
                color: #800000;      
            }

            .gerenciador {
                font-family: 'Montserrat', sans-serif;
                position: absolute;
                font-size: 40px;
                color: #800000;
                top: 25%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .entrada {
                word-spacing: 9px;
                font-family: 'Montserrat', sans-serif;
                position: absolute;
                font-size: 18px;
                color: #800000;
                top: 5%;
                left: 90%;
                transform: translate(-50%, -50%);
            }

            .data {
                position: absolute;
                color: #800000;
                top: 60%;
                left: 50%;
                font-family: 'Montserrat', sans-serif;
                display: flex;
                font-size: 20px;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="entrada">                           
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        @if (Route::has('sobre'))
                            <a href="{{ route('sobre') }}">Sobre</a>
                        @endif        
                        @if (Route::has('noticias'))
                            <a href="{{ route('noticias') }}">{{ __('Noticias') }}</a>  {{-- Suporta lang --}}  
                        @endif 
                        @if (Route::has('Cadastre-se'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastre-se</a>
                        @endif
                    @endauth 
                </div>
            @endif
                    </div>
                </div>
            </div>
        </div>
        <p class="gerenciador">O gerenciador de pontos para a sua empresa.</p>
        <div class="relogio">
                        <div>
                            <span id="horas">00</span>
                            <span class="tempo">Horas</span>
                        </div>

                        <div>
                            <span id="minutos">00</span>
                            <span class="tempo">Minutos</span>
                        </div>

                        <div>
                            <span id="segundos">00</span>
                            <span class="tempo">Segundos</span>
                        </div>
                    </div> 
        <div class="data">
                        <div>
                            <span id="dataAtual"></span>
                        </div>
        </div>
    </body>
    <script>
        const horas = document.getElementById('horas');
        const minutos = document.getElementById('minutos');
        const segundos = document.getElementById('segundos');

        const relogio = setInterval(function time(){
            let dateToday = new Date();
            let hr = dateToday.getHours();
            let min = dateToday.getMinutes();
            let seg = dateToday.getSeconds();

            if (hr < 10) hr = '0' + hr;
            if (min < 10) min = '0' + min;
            if (seg < 10) seg = '0' + seg;

            horas.textContent = hr;
            minutos.textContent = min;
            segundos.textContent = seg;
            
        })

        const elementoDataAtual = document.getElementById('dataAtual');
        const dataAtual = new Date();

            let diaMes = dataAtual.getDate();
            let numeroMes = dataAtual.getMonth();

            const mes = numeroMes + 1;
            const ano = dataAtual.getFullYear();
            const dataFormatada = diaMes + '/' + mes + '/' + ano;
            
        elementoDataAtual.textContent = dataFormatada;

    </script>
</html>
