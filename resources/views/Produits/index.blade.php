@extends("base")
@section("titre","Liste produit")
@section("contenue")

<section class="bg-light">
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>    
        @endif
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Liste des Produits</h1>
            </div>
        </div>
        <div class="text-end mb-4">
            <a href="{{ route('produit.create') }}" class="btn btn-success btn-lg px-4">Ajouter un produit</a>
        </div>
        <div class="row">
            @foreach ($produits as $produit)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 d-flex flex-column">
                    @if ($produit->image)   
                    <a href="shop-single.html">
                        <img src="{{$produit->image_url()}}" class="card-img-top" alt="..." style="width: 100%; height: 250px; object-fit: cover;">
                    </a>
                    @else
                    <img src="{{asset('assets/img/banner_img_01.jpg')}}" class="card-img-top" alt="..." style="width: 100%; height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <p class="card-text">
                            <em>Catégorie :</em>
                            {{$produit->categorie->nom_categorie}}
                        </p>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$produit->nom_produit}}</a>
                        <p class="card-text flex-grow-1">
                            {{$produit->description}}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-primary btn-lg px-4">Modifier</a>
                            <form action="{{route('produit.delete', $produit)}}" method="post" class="mb-0">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-lg px-4">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
