@extends('layouts.app')


@section('content')
<head>   
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet"> 
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header titulo" style="display: flex; justify-content: space-between; align-items: center;">{{ __('Registro de Ponto') }}                          
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#insertPontoModal">
                        <i class="bi bi-plus-circle"></i>   
                    </button>                       
                </div>

                <div class="card-body">          
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert"">
                        {{ session('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                    @endif
                    <!-- Novo Registro -->
                    <div class="modal fade" id="insertPontoModal" tabindex="-1" role="dialog" aria-labelledby="insertPontoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertPontoModalLabel">Registrar ponto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('/pontos/') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label for="nome">Nome:</label>
                                            <input placeholder="Selecione o nome" type="text" class="form-control" name="nome" value="" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="data">Data:</label>
                                            <input placeholder="Insira a data:" type="date" class="form-control col-sm-6" name="data" value="" required autofocus>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="entrada">Entrada:</label>
                                                    <input placeholder="Insira o horário de entrada:" type="time" class="form-control" name="entrada" maxlength="6" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="saida">Saída:</label>
                                                    <input placeholder="Insira o horário de saída:" type="time" class="form-control" name="saida" maxlength="6" value="" required>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <!-- <div class="form-group col-sm-3">
                                            <label for="entrada">Entrada:</label>
                                            <input placeholder="Insira o horario de entrada:" type="time" class="form-control" name="entrada" maxlength="6" value="" required>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="saida">Saida:</label>
                                            <input placeholder="Insira o horario de saida:" type="time" class="form-control" name="saida" maxlength="6" value="" required>
                                        </div> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" id="criar_ponto" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($pontos))  {{-- Caso não encontre nenhum registro de ponto --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="col-sm-3">Nome</th>
                                    <th scope="col" class="col-sm-2">Data</th>                                 
                                    <th scope="col">Entrada</th>                                     
                                    <th scope="col" class="col-sm-3">Saida</th>
                                    <th scope="col">Ações</th>                                    
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($pontos as $ponto)
                                <tr>                                
                                    <th scope="row">{{ $ponto->id }}</th>
                                    <td>{{ $ponto->converterIdFuncionario->nome }}</td>
                                    <td>{{ $ponto->data }}</td>                                                                     
                                    <td>{{ $ponto->entrada }}</td> 
                                    <td>{{ $ponto->saida }}</td>                                                                       
                                    <td>                                               
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updatePontoModal{{ $ponto->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deletePonto({{ $ponto->id }}, '{{ $ponto->data }}')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>                                       
                                    </td>
                                </tr>
                                <!-- Atualizar Registro -->
                                <div class="modal fade" id="updatePontoModal{{ $ponto->id }}" tabindex="-1" role="dialog" aria-labelledby="updatePontoModalLabel{{ $ponto->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updatePontoModalLabel{{ $ponto->id }}">Atualizar registro de ponto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/pontos/'.$ponto->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="{{ $ponto->funcionario_id }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="data">Data:</label>
                                                        <input type="date" class="form-control" name="data" value="{{ $ponto->data }}" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="entrada">Entrada:</label>
                                                        <input type="entrada" class="form-control" name="entrada" maxlength="6" value="{{ $ponto->entrada }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="saida">Saida:</label>
                                                        <input type="saida" class="form-control" name="saida" maxlength="6" value="{{ $ponto->saida }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_ponto" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>

                        @if($pontos->isnotEmpty())
                            <div class="pagination-container d-flex justify-content-end" >
                                <div class="pagination-summary">
                                    Mostrando <strong>{{ $pontos->firstItem() }}</strong> a <strong>{{ $pontos->lastItem() }}</strong> de <strong>{{ $pontos->total() }}</strong> resultados &nbsp;
                                </div>
                                {{ $pontos->links('pagination::bootstrap-4') }}
                            </div>
                        @endif                                                 
                    @endif   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    {{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}
    <script src="{{ asset('js/pontos.js') }}"></script> 
@endsection
