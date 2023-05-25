@extends('layouts.app')


@section('content')
<head>   
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titulo">{{ __('Lista de Cidades') }}</div>

                <div class="card-body">
                    
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (isset($cidades))  {{-- Caso não encontre nenhuma cidade --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>                                 
                                    <th scope="col">UF</th>                                     
                                    <th scope="col">Ações</th>                                    
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($cidades as $cidade)
                                <tr>                                
                                    <th scope="row">{{ $cidade->id }}</th>
                                    <td>{{ $cidade->nome }}</td>                                                                     
                                    <td>{{ $cidade->uf }}</td>                                                                      
                                    <td>                                               
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateCidadeModal{{ $cidade->id }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCidade({{ $cidade->id }}, '{{ $cidade->nome }}')">
                                            Excluir
                                        </button>                                       
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateCidadeModal{{ $cidade->id }}" tabindex="-1" role="dialog" aria-labelledby="updateCidadeModalLabel{{ $cidade->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateCidadeModalLabel{{ $cidade->id }}">Atualizar Cidade</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/cidades/'.$cidade->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="{{ $cidade->nome }}" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="uf">UF:</label>
                                                        <input type="uf" class="form-control" name="uf" maxlength="2" value="{{ $cidade->uf }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_cidade" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>
                        
                        <div class="novo-registro d-flex" >
                            <button type="submit" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#insertCidadeModal{{ $cidade->id }}">
                                Novo Registro
                            </button>  
                            
                             <!-- botão novo registro -->

                             <div class="modal fade" id="insertCidadeModal{{ $cidade->id }}" tabindex="-1" role="dialog" aria-labelledby="insertCidadeModalLabel{{ $cidade->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertCidadeModalLabel{{ $cidade->id }}">Criar Cidade</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/cidades/'.$cidade->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
                                                        <input placeholder="Digite o nome da cidade" type="text" class="form-control" name="nome" value="" required autofocus>
                                                    </div>                                                                                                      
                                                    <div class="form-group">
                                                        <label for="uf">UF:</label>
                                                        <input type="uf" class="form-control" name="uf" maxlength="2" value="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="criar_cidade" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                        </div>
                        

                        @if($cidades->isnotEmpty())
                            <div class="pagination-container d-flex justify-content-end" >
                                <div class="pagination-summary">
                                    Mostrando <strong>{{ $cidades->firstItem() }}</strong> a <strong>{{ $cidades->lastItem() }}</strong> de <strong>{{ $cidades->total() }}</strong> resultados &nbsp;
                                </div>
                                {{ $cidades->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                            <!-- {{ $cidades->links('pagination::bootstrap-4') }}  -->                        
                    @endif   
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    {{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}
    <script src="{{ asset('js/cidades.js') }}"></script> 
@endsection
