@extends('base')

@section('titulo', 'Listagem reserva')

@section('conteudo')

<h1>Lista de Reservas</h1>

<a href="{{ route('reservas.create') }}" style="padding: 10px; background-color: #4e5d56; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 20px;">Nova Reserva</a>

@if(session('success'))
    <div style="color: #4e5d56; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Cliente</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Pacote</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Data da Reserva</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Quantidade de Pessoas</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @if($reservas->isEmpty())
            <tr>
                <td colspan="7" style="text-align: center; padding: 12px; border: 1px solid #ddd;">Nenhuma reserva encontrada.</td>
            </tr>
        @else
            @foreach($reservas as $reserva)
            <tr>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->id }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->cliente_id }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->pacote_id }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->data_reserva }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->quantidade_pessoas }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $reserva->status }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">
                    <a href="{{ route('reservas.edit', $reserva) }}" style="color: #4e5d56; text-decoration: none;">Editar</a>
                    <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #4e5d56; background: none; border: none; cursor: pointer; padding: 0;">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

@endsection
