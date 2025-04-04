@extends("base")

@section("titre", "Liste des catégories")

@section("contenue")
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des catégories</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succès!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('categorie.create') }}" class="btn btn-success btn-lg shadow-sm rounded-3">Créer une nouvelle catégorie</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($categories as $categorie)
            <div class="col">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categorie->nom_categorie }}</h5>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-warning btn-sm shadow-sm rounded-3">Modifier</a>
                            <a href="{{ route('categorie.delete', $categorie->id) }}" class="btn btn-danger btn-sm shadow-sm rounded-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
