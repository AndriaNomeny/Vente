<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link active" href="{{url('/indexx')}}">Produit</a>
            <a class="nav-item nav-link active" href="{{url('/index')}}">Categorie</a>
          </div>
        </div>
      </nav>
    <title>Modifier la catégorie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1 
           {
               text-align: center; /* Centrer le titre */
               margin-bottom: 20px;
           }
       
   </style>
   
</head>
<body>
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
</body>
</html>
