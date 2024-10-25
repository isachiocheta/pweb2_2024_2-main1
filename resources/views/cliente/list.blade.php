@extends('base')
@section('titulo', 'Listagem cliente')
@section('conteudo')

<div class="jumbotron jumbotron-fluid" style="background-color: #4e5d56; color: white;">
    <div class="container text-center">
        <h1 class="display-4">Listagem de Clientes</h1>
        <p class="lead">Gerencie e visualize todos os seus clientes aqui.</p>
    </div>
</div>

<div class="container">
    <div class="row mb-4 mt-4">
        <form action="{{ route('cliente.search') }}" method="post" class="col">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" name="valor" class="form-control" placeholder="Digite o valor">
                </div>
                <div class="col-md-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-custom">Buscar</button>
                    <a class="btn btn-custom" href="{{ url('cliente/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Categoria</th>
                    <th scope="col" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    @php
                        $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                    @endphp
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td><img src="/storage/{{ $nome_imagem }}" width="80px" alt="imagem"></td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cpf }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->categoria->nome ?? 'Não especificada' }}</td>
                        <td>
                            <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-action">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('cliente.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        style="background-color: #F5FFFA; color: #4e5d56; border: 2px solid #4e5d56;" 
                                        onclick="return confirm('Deseja remover o registro?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .btn-custom {
        background-color: #4e5d56; 
        color: white; 
        border: none;
    }
    .btn-custom:hover {
        background-color: #3a4a47; 
    }
    .table-dark {
        background-color: #4e5d56;
        color: white;
    }
    .table-responsive {
        margin-top: 20px;
    }
    .btn-action {
        background-color: #4e5d56;
        color: white; 
    }
    .btn-action:hover {
        background-color: #3a4a47;
    }
</style>

@stop
