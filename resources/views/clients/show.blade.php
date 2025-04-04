@extends('base')

@section('titre', 'Détails du produit')

@section('contenue')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4><i class="fas fa-box"></i> {{ $produit->name }}</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <div class="text-center mb-4">
                        @if ($produit->image)
                            <img src="{{ $produit->image_url() }}" alt="{{ $produit->name }}" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300" alt="Image du produit" class="img-fluid rounded">
                        @endif
                    </div>
                    <h5 class="text-primary font-weight-bold">{{ $produit->name }}</h5>
                    <p class="text-muted">{{ $produit->description }}</p>
                    <p class="text-success"><strong>Prix :</strong> {{ number_format($produit->prix, 2) }} €</p>
                    <p class="text-success"><strong>Stock :</strong> {{ $produit->stock }}</p>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('accueil') }}" class="btn btn-secondary flex-fill mx-1">Retour</a>
                        <a href="{{ route('passerCommande', $produit) }}" class="btn btn-success text-white flex-fill mx-1">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
