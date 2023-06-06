@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header titulo">{{ __('Bem-vindo!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                 //   use Illuminate\Support\Facades\Auth;

                    function getGreeting() {
                        date_default_timezone_set('America/Sao_Paulo');
                        $currentTime = date('H:i:s');
                        $hour = (int) substr($currentTime, 0, 2);

                        if ($hour >= 5 && $hour < 12) {
                            return 'Bom dia';
                        } elseif ($hour >= 12 && $hour < 18) {
                            return 'Boa tarde';
                        } else {
                            return 'Boa noite';
                        }
                    }
                   
                    if (Auth::check()) {
                        $user = Auth::user();
                        $greeting = getGreeting();
                        echo $greeting . ', ' . $user->name . '! ' . "<br>" . 'Simplifique e aprimore o gerenciamento do ponto dos colaboradores da sua empresa. Bora trabalhar!';
                    } else {
                        echo 'Bem-vindo ao nosso site.';
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
