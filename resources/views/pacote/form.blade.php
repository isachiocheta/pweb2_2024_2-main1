@extends('base')
@section('titulo', 'Formulário Pacote')
@section('conteudo')

<h3>Formulário Pacote</h3>

<div class="container">
    <h1>{{ isset($pacote) ? 'Editar Pacote' : 'Criar Pacote' }}</h1>

    <form action="{{ isset($pacote) ? route('pacotes.update', $pacote->id) : route('pacotes.store') }}" method="POST">
        @csrf
        @if (isset($pacote))
            @method('PUT') 
        @endif

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $pacote->nome ?? '') }}" required>
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="destino">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino" value="{{ old('destino', $pacote->destino ?? '') }}" required>
            @error('destino')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ old('data_inicio', $pacote->data_inicio ?? '') }}" required>
            @error('data_inicio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim</label>
            <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ old('data_fim', $pacote->data_fim ?? '') }}" required>
            @error('data_fim')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('preco', $pacote->preco ?? '') }}" required>
            @error('preco')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">{{ isset($pacote) ? 'Atualizar' : 'Criar' }}</button>
    </form>
</div>
@endsection
