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
                <div class="card-header titulo" style="display: flex; justify-content: space-between; align-items: center;">{{ __('Lista de Funcionários') }}                          
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#insertFuncionarioModal">
                        <i class="bi bi-plus-circle"></i>   
                    </button>                       
                </div>

                <div class="card-body">          
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                    @endif
                    <!-- Novo Registro -->
                    <div class="modal fade" id="insertFuncionarioModal" tabindex="-1" role="dialog" aria-labelledby="insertFuncionarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertFuncionarioModalLabel">Novo Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('/funcionarios') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label for="nome">Nome:</label>
                                            <input placeholder="Digite o nome" type="text" class="form-control" name="nome" value="" required autofocus>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">                                                                                                          
                                                <div class="form-group">
                                                    <label for="email">E-mail:</label>
                                                    <input placeholder="Digite o e-mail" type="email" class="form-control" name="email" value="" required>
                                                </div>
                                            </div>                                                                                                        
                                            <div class="col-sm-4">                                                                                                          
                                                <div class="form-group">
                                                   <label for="cpf">CPF:</label>
                                                    <input placeholder="Digite o CPF" type="cpf" class="form-control" name="cpf" maxlength="11" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cidade">Cidade:</label>
                                            <!-- <input placeholder="Selecione a cidade" type="text" class="form-control" name="cidade" value="" required> -->
                                            <select name="cidade_id" id="cidade_id" class="form-control">
                                                <option value="" disabled selected>Selecione a cidade</option>
                                                                                 
                                                
                                                <!-- @php    
                                                    $selecionarCidade = $funcionarios->unique('converterIdCidade.nome')->sortBy('converterIdCidade.nome');
                                                @endphp -->

                                                @foreach($selecionarCidade as $funcionario)
                                                    <option value="{{ $funcionario->converterIdCidade->nome }}">{{ $funcionario->converterIdCidade->nome }}</option>
                                                @endforeach
                                                
                                            </select>




                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="cargo">Cargo:</label>                                           
                                            <!-- <input placeholder="Selecione o cargo" type="text" class="form-control" name="cargo" value="" required> -->
                                            <select name="cargo_id" id="cargo_id" class="form-control">
                                                <option value="" disabled selected>Selecione o cargo</option>
                                                                                        
                                                
                                                <!-- @php    
                                                    $cargosUnicos = $funcionarios->unique('converterIdCargo.nome')->sortBy('converterIdCargo.nome');
                                                @endphp -->

                                                @foreach($cargosUnicos as $funcionario)
                                                    <option value="{{ $funcionario->converterIdCargo->nome }}">{{ $funcionario->converterIdCargo->nome }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" id="criar_funcionario" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($funcionarios))  {{-- Caso não encontre nenhum funcionário --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="col-sm-3">Nome</th>                                 
                                    <th scope="col">E-mail</th>                                     
                                    <th scope="col">CPF</th>                                     
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Cargo</th>                                                                          
                                    <th scope="col">Ações</th>                                    
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($funcionarios as $funcionario)
                                <tr>                                
                                    <th scope="row">{{ $funcionario->id }}</th>
                                    <td>{{ $funcionario->nome }}</td>                                                                     
                                    <td>{{ $funcionario->email }}</td>                                                                      
                                    <td>{{ $funcionario->cpf }}</td>                                                                     
                                    <td>{{ $funcionario->converterIdCidade->nome }}</td>                                                                     
                                    <td>{{ $funcionario->converterIdCargo->nome }}</td>                                                                     
                                    <td>                                               
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateFuncionarioModal{{ $funcionario->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteFuncionario({{ $funcionario->id }}, '{{ $funcionario->nome }}')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>                                       
                                    </td>
                                </tr>

                                <!-- Atualizar Registro -->
                                <div class="modal fade" id="updateFuncionarioModal{{ $funcionario->id }}" tabindex="-1" role="dialog" aria-labelledby="updateFuncionarioModalLabel{{ $funcionario->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateFuncionarioModalLabel{{ $funcionario->id }}">Atualizar Funcionário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/funcionarios/'.$funcionario->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="{{ $funcionario->nome }}" required autofocus>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">  
                                                            <div class="form-group">
                                                                <label for="email">E-mail:</label>
                                                                <input type="email" class="form-control" name="email" value="{{ $funcionario->email }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">                                                                                                        
                                                            <div class="form-group">
                                                                <label for="cpf">CPF:</label>
                                                                <input type="cpf" class="form-control" name="cpf" maxlength="11" value="{{ $funcionario->cpf }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cidade">Cidade:</label>
                                                        <input type="text" class="form-control" name="cidade" value="{{ $funcionario->cidade_id }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cargo">Cargo:</label>
                                                        <input type="text" class="form-control" name="cargo" value="{{ $funcionario->cargo_id }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_funcionario" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>

                        @if($funcionarios->isnotEmpty())
                            <div class="pagination-container d-flex justify-content-end" >
                                <div class="pagination-summary">
                                    Mostrando <strong>{{ $funcionarios->firstItem() }}</strong> a <strong>{{ $funcionarios->lastItem() }}</strong> de <strong>{{ $funcionarios->total() }}</strong> resultados &nbsp;
                                </div>
                                {{ $funcionarios->links('pagination::bootstrap-4') }}
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
    <script src="{{ asset('js/funcionarios.js') }}"></script> 
@endsection
