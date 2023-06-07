 @extends('layouts.app')


@section('content')
<head>   
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">  
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header titulo" style="display: flex; justify-content: space-between; align-items: center;">{{ __('Lista de Cargos') }}                          
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#insertCargoModal">
                        <i aria-hidden="true" class="fa fa-fw fa-user-plus"></i> Novo Registro    
                    </button>                       
                </div>

                <div class="card-body">          
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                    @endif
                    @if (isset($cargos))  {{-- Caso não encontre nenhum cargo --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cargo</th>                                 
                                    <th scope="col">Departamento</th>  
                                    <th scope="col">Ações</th>                                     
                                   
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($cargos as $cargo)
                                <tr>                                
                                    <th scope="row">{{ $cargo->id }}</th>
                                    <td>{{ $cargo->nome }}</td>                                                                     
                                    <td>{{ $cargo->departamento }}</td>                                                                      
                                    <td>                                               
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateCargoModal{{ $cargo->id }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCargo({{ $cargo->id }}, '{{ $cargo->nome }}')">
                                            Excluir
                                        </button>                                       
                                    </td>
                                </tr>

                                <!-- Novo Registro -->
                                <div class="modal fade" id="insertCargoModal" tabindex="-1" role="dialog" aria-labelledby="insertCargoModalLabel{{ $cargo->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertCargoModalLabel{{ $cargo->id }}">Criar Cargo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/cargos/'.$cargo->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="nome">Cargo:</label>
                                                        <input placeholder="Digite o nome do cargo" type="text" class="form-control" name="nome" value="" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="departamento">Departamento</label>
                                                        <input placeholder="Digite o departamento" type="departamento" class="form-control" name="departamento" value="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="criar_cargo" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Atualizar Registro -->
                                <div class="modal fade" id="updateCargoModal{{ $cargo->id }}" tabindex="-1" role="dialog" aria-labelledby="updateCargoModalLabel{{ $cargo->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateCargoModalLabel{{ $cargo->id }}">Atualizar Cargo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/cargos/'.$cargo->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="{{ $cargo->nome }}" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="departamento">Departamento:</label>
                                                        <input type="deprtamentoa" class="form-control" name="departamento" maxlength="2" value="{{ $cargo->departamento }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_cargo" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>

                        @if($cargos->isnotEmpty())
                            <div class="pagination-container d-flex justify-content-end" >
                                <div class="pagination-summary">
                                    Mostrando <strong>{{ $cargos->firstItem() }}</strong> a <strong>{{ $cargos->lastItem() }}</strong> de <strong>{{ $cargos->total() }}</strong> resultados &nbsp;
                                </div>
                                {{ $cargos->links('pagination::bootstrap-4') }}
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
    <script src="{{ asset('js/cargos.js') }}"></script> 
@endsection
