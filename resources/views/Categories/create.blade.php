@extends("base")
@section("titre","Cree Categorie")
@section("contenue")

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
        <form action="{{ route('categorie.store') }}" method="POST">
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
@endsection
