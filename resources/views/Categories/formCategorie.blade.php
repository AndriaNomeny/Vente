@extends("base")
@section("titre", $categorie->exists ? "Modifier la catégorie" : "Créer une nouvelle catégorie")
@section("contenue")

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4>{{ $categorie->exists ? 'Modifier' : 'Créer' }} une catégorie</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <!-- Formulaire pour créer ou modifier une catégorie -->
                    <form action="{{ $categorie->exists ? route('categorie.update', $categorie->id) : route('categorie.store') }}" method="POST">
                        @csrf
                        @if($categorie->exists)
                            @method('PUT')  <!-- Utilisation de la méthode PUT pour la mise à jour -->
                        @endif

                        <div class="mb-4">
                            <label for="nom" class="form-label">Nom de la catégorie</label>
                            <input type="text" class="form-control form-control-lg shadow-sm" id="nom" name="nom" value="{{ old('nom', $categorie->nom_categorie ?? '') }}" required>
                            @if ($errors->has('nom'))
                                <div class="text-danger mt-2">{{ $errors->first('nom') }}</div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm hover-effect">
                                {{ $categorie->exists ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="{{ route('categorie.index') }}" class="btn btn-outline-danger btn-lg shadow-sm">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
