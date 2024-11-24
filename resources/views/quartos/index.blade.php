<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Outros links e scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

        <!-- O conteúdo da página será inserido aqui -->
        @section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Quartos</h1>
    <a href="{{ route('quartos.create') }}" class="btn btn-success mb-3">Adicionar Novo Quarto</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quartos as $quarto)
                    <tr>
                        <td>{{ $quarto->id }}</td>
                        <td>{{ $quarto->numero }}</td>
                        <td>{{ $quarto->categoria->nome }}</td>
                        <td>{{ $quarto->descricao }}</td>
                        <td>
                            <a href="{{ route('quartos.edit', $quarto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('quartos.destroy', $quarto->id) }}" method="POST" class="d-inline" 
                                onsubmit="return confirm('Tem certeza que deseja excluir este quarto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
