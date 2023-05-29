@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
                <div class="card-header titulo" style="display: flex; justify-content: space-between; align-items: center;">{{ __('Lista de Usuários Administrativos') }}                          
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#insertUserModal">
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
                    @if (isset($users))  {{-- Caso não encontre nenhum usuário --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>                                 
                                    <th scope="col">E-mail</th>                    
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>                                 
                                    <td>{{ $user->email }}</td>                                  
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $user->id }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')">Excluir</button>
                                    </td>
                                </tr>
                                
                                <!-- Novo Registro -->
                                <div class="modal fade" id="insertUserModal" tabindex="-1" role="dialog" aria-labelledby="insertUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertUserModalLabel{{ $user->id }}">Novo Registro</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/users/'.$user->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input placeholder="Digite o nome" type="text" class="form-control" name="nome" value="" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="criar_user" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Atualizar Registro -->
                                <div class="modal fade" id="updateUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $user->id }}">Atualizar usuário administrativo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/users/'.$user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Nome:</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail:</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                                    </div>                                                  
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_user" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>
                        @if($users->isnotEmpty())
                            <div class="pagination-container d-flex justify-content-end" >
                                <div class="pagination-summary">
                                    Mostrando <strong>{{ $users->firstItem() }}</strong> a <strong>{{ $users->lastItem() }}</strong> de <strong>{{ $users->total() }}</strong> resultados &nbsp;
                                </div>
                                {{ $users->links('pagination::bootstrap-4') }}
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
    <script src="{{ asset('js/users.js') }}"></script>
@endsection
