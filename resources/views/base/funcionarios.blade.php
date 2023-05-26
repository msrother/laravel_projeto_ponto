@extends('layouts.app')


@section('content')
<head>   
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header titulo" style="display: flex; justify-content: space-between; align-items: center;">{{ __('Lista de Funcionários') }}                          
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#insertFuncionarioModal">
                        <i aria-hidden="true" class="fa fa-fw fa-user-plus"></i> Novo Registro    
                    </button>                       
                </div>

                <div class="card-body">          
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert"">
                        {{ session('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                    @endif
                    @if (isset($funcionarios))  {{-- Caso não encontre nenhum funcionário --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>                                 
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
                                    <td>{{ $funcionario->cidade }}</td>                                                                     
                                    <td>{{ $funcionario->cargo }}</td>                                                                     
                                    <td>                                               
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateFuncionarioModal{{ $funcionario->id }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteFuncionario({{ $funcionario->id }}, '{{ $funcionario->nome }}')">
                                            Excluir
                                        </button>                                       
                                    </td>
                                </tr>

                                <!-- Novo Registro -->
                                <div class="modal fade" id="insertFuncionarioModal" tabindex="-1" role="dialog" aria-labelledby="insertFuncionarioModalLabel{{ $funcionario->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertFuncionarioModalLabel{{ $funcionario->id }}">Novo Registro</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/funcionarios/'.$funcionario->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input placeholder="Digite o nome" type="text" class="form-control" name="nome" value="" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $funcionario->email }}" required>
                                                    </div>                                                                                                        
                                                    <div class="form-group">
                                                        <label for="cpf">CPF:</label>
                                                        <input type="cpf" class="form-control" name="cpf" maxlength="11" value="{{ $funcionario->cpf }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cidade">Cidade:</label>
                                                        <input type="text" class="form-control" name="cidade" value="{{ $funcionario->cidade }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cargo">Cargo:</label>
                                                        <input type="text" class="form-control" name="cargo" value="{{ $funcionario->cargo }}" required>
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
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $funcionario->email }}" required>
                                                    </div>                                                                                                        
                                                    <div class="form-group">
                                                        <label for="cpf">CPF:</label>
                                                        <input type="cpf" class="form-control" name="cpf" maxlength="11" value="{{ $funcionario->uf }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cidade">Cidade:</label>
                                                        <input type="text" class="form-control" name="cidade" value="{{ $funcionario->cidade }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cargo">Cargo:</label>
                                                        <input type="text" class="form-control" name="cargo" value="{{ $funcionario->cargo }}" required>
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
