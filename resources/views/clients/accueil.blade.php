@extends('base')

@section('titre', 'Accueil')

@section('contenue')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4><i class="fas fa-box"></i> Liste des produits</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <div class="row">
                        @foreach ($produits as $produit)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card shadow-sm rounded-lg h-100">
                                    @if ($produit->image)
                                        <img src="{{ $produit->image_url() }}" alt="{{ $produit->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/200" alt="Image du produit" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title font-weight-bold text-primary">{{ $produit->name }}</h5>
                                        <p class="card-text text-muted" style="height: 80px; overflow: hidden;">{{ Str::limit($produit->description, 100) }}</p>
                                        <p class="card-text text-success"><strong>Prix :</strong> {{ number_format($produit->prix, 2) }} €</p>
                                        <p class="card-text text-success"><strong>Stock :</strong> {{ $produit->stock }}</p>
                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('passerCommande', $produit) }}" class="btn btn-success text-white font-weight-bold flex-fill mx-1">Commander</a>
                                                <a href="{{ route('produits.show', $produit) }}" class="btn btn-info text-white font-weight-bold flex-fill mx-1">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
