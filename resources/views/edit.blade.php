@extends("base")
@section("titre","Modifier la categorie")
@section("contenue")

    <div class="container mt-4">
        <h1>Modifier la catégorie</h1>

        <!-- Formulaire pour modifier la catégorie -->
        <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
            @csrf
            @method('POST') 

            <div class="form-group">
                <label for="nom">Nom de la catégorie</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $categorie->nom_categorie) }}" required>
            </div>
            @if ($errors->has('nom'))
            <div class="text-danger">{{ $errors->first('nom')}}</div>
            @endif
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <div class="mt-2"><a href="{{ url('/index') }}" class="btn btn-outline-danger">Annuler</a></div>
        </form>
    </div>
@endsection

