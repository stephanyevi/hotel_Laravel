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
    <h1 class="mb-4">Adicionar Quarto</h1>

    <form action="{{ route('quartos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="categoria_quarto_id" class="form-label">Categoria</label>
            <select name="categoria_quarto_id" id="categoria_quarto_id" class="form-control" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('quartos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
