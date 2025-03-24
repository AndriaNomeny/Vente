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
    <title>Créer une catégorie</title>
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
        <h1>Créer une nouvelle catégorie</h1>

        <!-- Vérification des erreurs -->
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
        </div>
        @endif --}}
        
        <!-- Formulaire pour créer une catégorie -->
        <form action="{{ route('categorie.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de la catégorie</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                @if ($errors->has('nom'))
                    <div class="text-danger">{{ $errors->first('nom')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            {{-- <div>
                <class= href="{{'/index'}}" class="btn btn-primary">Créer</class=>
            </div> --}}
            <div class="mt-2">
                <a href="{{('/index')}}" class="btn btn-outline-danger">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
