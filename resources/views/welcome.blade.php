<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Sistema de Gestão de Viagens</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .jumbotron {
            background-color: #4e5d56;
            color: white;
            text-align: center; 
            padding: 100px 0; 
        }
        .btn-custom {
            background-color: #F5FFFA; 
            color: #4e5d56;
            margin: 0 10px; 
        }
        .btn-custom:hover {
            background-color: #e0f2f2;
        }
        .image-container {
            margin-top: 50px;
        }
        .image-container img {
            width: 100%;
            max-width: 400px; 
            margin: 20px; 
            border-radius: 8px; 
        }
    </style>
</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Bem-vindo ao Sistema de Gestão de Viagens</h1>
        <h2 class="display-4">BIECZ</h2>
        <p class="lead">Gerencie suas reservas, pacotes e clientes.</p>
        <hr class="my-4">
        <div class="d-flex justify-content-center">
            <a href="{{ route('cliente.index') }}" class="btn btn-custom">Gerenciar Clientes</a>
            <a href="{{ route('pacotes.index') }}" class="btn btn-custom">Gerenciar Pacotes</a>
            <a href="{{ route('reservas.index') }}" class="btn btn-custom">Gerenciar Reservas</a>
        </div>
    </div>


<div class="container image-container text-center">
 
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('imagens/logobiecz.jpg') }}" alt="Descrição da Imagem 1">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('imagens/logobiecz.jpg') }}" alt="Descrição da Imagem 2">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('imagens/logobiecz.jpg') }}" alt="Descrição da Imagem 3">
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
