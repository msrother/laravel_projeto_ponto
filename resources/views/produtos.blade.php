@extends('layouts.app')

@section('content')
    <h1>Cadastrar produto</h1>
    <form method="POST" action="{{ route('produtos.salvar') }}">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo">
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor">
        </div>
        <div>
            <label for="validade">Validade:</label>
            <input type="date" name="validade" id="validade">
        </div>
        <div>
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection