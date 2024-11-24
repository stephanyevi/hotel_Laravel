@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detalhes da Categoria</h1>

        <!-- Detalhes da categoria -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome: {{ $categoria->nome }}</h5>
                <p class="card-text"><strong>Descrição:</strong> {{ $categoria->descricao }}</p>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($categoria->preco, 2, ',', '.') }}</p>
                
                <a href="{{ route('categorias-quarto.index') }}" class="btn btn-secondary">Voltar</a>
                <a href="{{ route('categorias-quarto.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection