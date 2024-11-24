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
        <h1 class="mb-4">Categorias de Quarto</h1>

        <!-- Botão para adicionar nova categoria -->
        <a href="{{ route('categorias-quarto.create') }}" class="btn btn-success mb-3">
            Adicionar Nova Categoria
        </a>

        <!-- Tabela de Categorias de Quarto -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Categorias</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nome }}</td>
                            <td>{{ $categoria->descricao }}</td>
                            <td>R$ {{ number_format($categoria->preco, 2, ',', '.') }}</td>
                            <td>
                                <!-- Botões de Ação (Editar e Excluir) -->
                                <a href="{{ route('categorias-quarto.edit', $categoria->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <!-- Formulário para excluir categoria -->
                                <form action="{{ route('categorias-quarto.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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

