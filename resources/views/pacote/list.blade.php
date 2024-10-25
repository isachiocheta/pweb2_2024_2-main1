@extends('base')

@section('titulo', 'Listagem de Pacotes')

@section('conteudo')

<h3 class="mb-4">Listagem de Pacotes</h3>

<div class="container mb-4">
    <div class="row mb-3">
        <div class="col-md-12">
            <form action="{{ route('pacotes.search') }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group mx-sm-2">
                    <input type="text" name="valor" class="form-control mt-3" placeholder="Buscar Pacote" required>
                </div>
                <button type="submit" class="btn mt-3" style="background-color: darkred; color: white;">Buscar</button>
                <a class="btn ml-2 mt-3" href="{{ route('pacotes.create') }}" style="background-color: darkred; color: white;">Novo Pacote</a>
            </form>
        </div>
    </div>
</div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Destino</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dados as $pacote)
                <tr>
                    <td>{{ $pacote->nome }}</td>
                    <td>{{ $pacote->destino }}</td>
                    <td>{{ \Carbon\Carbon::parse($pacote->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($pacote->data_fim)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($pacote->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pacotes.edit', $pacote->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacotes.destroy', $pacote->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum pacote encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
