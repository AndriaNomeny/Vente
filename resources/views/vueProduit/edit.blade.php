<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link active" href="{{ url('/indexx') }}">Produit</a>
            <a class="nav-item nav-link active" href="{{ url('/index') }}">Catégorie</a>
          </div>
        </div>
    </nav>
    <title>Modifier un produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-item nav-link active" href="#">Produit</a>
                <a class="nav-item nav-link active" href="{{ url('/index') }}">Categorie</a>
            </div>
            <!-- Bouton de déconnexion -->
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link text-danger" href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{route('deconnexion')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

    <div class="container mt-4">
        <h1>Modifier le produit</h1>
        <form action="{{route('produit.update', $produit) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT')  <!-- Cette ligne permet de spécifier que la méthode est PUT pour la mise à jour --> --}}
            
            <div class="form-group">
                <label for="nom">Nom du produit</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $produit->nom_produit) }}" required>
                @if ($errors->has('nom'))
                    <div class="text-danger">{{ $errors->first('nom') }}</div>
                @endif
            </div>

            <!-- Sélecteur de catégories existantes -->
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select class="form-control" name="categorie_id" id="categorie_id" required>
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categorie as $categorie)
                        <option value="{{ $categorie->id }}" 
                            {{ $categorie->id == $produit->categorie_id ? 'selected' : '' }}>
                            {{ $categorie->nom_categorie }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('categorie_id'))
                    <div class="text-danger">{{ $errors->first('categorie_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $produit->description) }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Image du produit</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($produit->image)
                    <img src="{{ asset('storage/'.$produit->image) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <div class="mt-2">
                <a href="{{ url('/indexx') }}" class="btn btn-outline-danger">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
