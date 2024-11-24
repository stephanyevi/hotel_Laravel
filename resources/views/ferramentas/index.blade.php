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
    <h1>Ferramentas de Manutenção</h1>
    <a href="{{ route('ferramentas-manutencao.create') }}" class="btn btn-success mb-3">Adicionar Ferramenta</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ferramentas as $ferramenta)
                <tr>
                    <td>{{ $ferramenta->id }}</td>
                    <td>{{ $ferramenta->nome }}</td>
                    <td>{{ $ferramenta->descricao }}</td>
                    <td>{{ $ferramenta->quantidade }}</td>
                    <td>
                        <a href="{{ route('ferramentas-manutencao.edit', $ferramenta->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('ferramentas-manutencao.destroy', $ferramenta->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhuma ferramenta cadastrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

