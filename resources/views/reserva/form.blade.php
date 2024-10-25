@extends('base')

@section('titulo', 'Nova Reserva')

@section('conteudo')

<h1>{{ isset($reserva) ? 'Editar Reserva' : 'Nova Reserva' }}</h1>

<form action="{{ isset($reserva) ? route('reservas.update', $reserva) : route('reservas.store') }}" method="POST" style="max-width: 500px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 5px; background-color: #f9f9f9;">
    @csrf
    @if(isset($reserva))
        @method('PUT')
    @endif

    <div style="margin-bottom: 15px;">
        <label for="cliente_id" style="display: block; margin-bottom: 5px;">Cliente ID:</label>
        <input type="text" name="cliente_id" value="{{ $reserva->cliente_id ?? '' }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="pacote_id" style="display: block; margin-bottom: 5px;">Pacote ID:</label>
        <input type="text" name="pacote_id" value="{{ $reserva->pacote_id ?? '' }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="data_reserva" style="display: block; margin-bottom: 5px;">Data da Reserva:</label>
        <input type="date" name="data_reserva" value="{{ $reserva->data_reserva ?? '' }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="quantidade_pessoas" style="display: block; margin-bottom: 5px;">Quantidade de Pessoas:</label>
        <input type="number" name="quantidade_pessoas" value="{{ $reserva->quantidade_pessoas ?? '' }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="status" style="display: block; margin-bottom: 5px;">Status:</label>
        <input type="text" name="status" value="{{ $reserva->status ?? '' }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
    </div>

    <button type="submit" style="background-color: #4e5d56; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">
        {{ isset($reserva) ? 'Atualizar' : 'Salvar' }}
    </button>
</form>

@endsection
