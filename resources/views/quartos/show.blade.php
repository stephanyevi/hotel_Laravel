@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detalhes do Quarto</h1>

    <div class="card">
        <div class="card-header">
            <h3>Quarto Número: {{ $quarto->numero }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Categoria:</strong> {{ $quarto->categoria->nome }}</p>
            <p><strong>Descrição:</strong> {{ $quarto->descricao }}</p>
            <a href="{{ route('quartos.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>
@endsection