@extends("base")

@section("titre", "Liste des catégories")

@section("contenue")
<div class="container mt-4">
    <h1 class="text-center">Liste des catégories</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>    
    @endif

    <a href="{{ route('categorie.create') }}" class="btn btn-primary mb-3">Créer une nouvelle catégorie</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->nom_categorie }}</td>
                    <td>
                        <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('categorie.delete', $categorie->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection