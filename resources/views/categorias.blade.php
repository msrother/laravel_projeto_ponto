@extends('layouts.app')

@section('content')
    <h1>Cadastro de categoria</h1>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection