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
            <a class="nav-item nav-link active" href="#">Categorie</a>
          </div>
        </div>
      </nav>
    <title>Liste des catégories</title>
    <!-- Ajouter les liens vers les fichiers CSS, par exemple Bootstrap -->
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
        <h1>Liste des catégories</h1>
        @if (session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>    
        @endif
        <a href="{{url('/index/create')}}" class="btn btn-primary mb-3">Créer une nouvelle catégorie</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle manapotra catégories -->
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->nom_categorie }}</td>
                        <td>
                            <!-- Ajouter ici des actions comme Modifier ou Supprimer -->
                            <a href="{{route('categorie.edit', $categorie->id)}}" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="{{route('categorie.delete', $categorie->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Sur amzany ve lelenty e?')">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
          </div>
        </div>
      </nav>
    <title>Liste des catégories</title>
    <!-- Ajouter les liens vers les fichiers CSS, par exemple Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Appliquer un style pour occuper toute la largeur et la hauteur */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 100%; /* Pour occuper toute la largeur */
        }
        h1 {
            text-align: center; /* Centrer le titre */
            margin-bottom: 20px;
        }
        table {
            width: 100%; /* Utiliser toute la largeur disponible */
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des catégories</h1>
        @if (session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>    
        @endif
        <a href="{{url('/index/create')}}" class="btn btn-primary mb-3">Créer une nouvelle catégorie</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle manapotra catégories -->
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->nom_categorie }}</td>
                        <td>
                            <a href="{{route('categorie.edit', $categorie->id)}}" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="{{route('categorie.delete', $categorie->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Sur amzany ve lelenty e?')">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> --}}
