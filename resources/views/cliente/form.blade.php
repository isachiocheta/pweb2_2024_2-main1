@extends('base')
@section('titulo', 'Formulário cliente')
@section('conteudo')

<div class="container mt-5" style="background-color: #4e5d56; padding: 20px; border-radius: 8px;">
    <div class="border rounded shadow bg-white p-4">
        <h3 class="text-center">Formulário Cliente</h3>

        @php
            if (!empty($dado->id)) {
                $route = route('cliente.update', $dado->id);
            } else {
                $route = route('cliente.store');
            }
        @endphp

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $dado->nome ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $dado->cpf ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $dado->telefone ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <option value="Categoria 1">Cliente Regular</option>
                    <option value="Categoria 2">Cliente VIP</option>
                    <option value="Categoria 3">Cliente Corporativo</option>
                    <option value="Categoria 4">Cliente Novato</option>
                    <option value="Categoria 5">Cliente de Fidelidade</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn" style="background-color: #F5FFFA; color: black;">Salvar</button>
                <a href="{{ url('cliente') }}" class="btn btn-light">Voltar</a>
            </div>
        </form>
    </div>
</div>

<style>
    .container {
        max-width: 600px;
    }
</style>

@stop
