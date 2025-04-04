@extends('base')

@section('titre', 'Passer une commande')

@section('contenue')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4><i class="fas fa-shopping-cart"></i> Passer une commande</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <div class="text-center mb-4">
                        @if ($produit->image)
                            <img src="{{ $produit->image_url() }}" alt="{{ $produit->name }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/200" alt="Image du produit" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @endif
                    </div>

                    <h4 class="text-primary font-weight-bold">{{ $produit->name }}</h4>
                    <p class="text-muted">{{ $produit->description }}</p>
                    <p class="text-success"><strong>Prix :</strong> {{ number_format($produit->prix, 2) }} €</p>

                    <!-- Formulaire de commande -->
                    <form action="{{ route('commande', $produit) }}" method="POST">
                        @csrf
                    
                        {{-- <input type="hidden" name="produit_id" value="{{ $produit->id }}"> --}}
                    
                        @include('shared.input', ['name' => 'nom', 'label' => 'Nom', 'value' => $client->nom])
                        @include('shared.input', ['name' => 'emailClient', 'label' => 'Email', 'value' => $client->emailClient])
                        @include('shared.input', ['name' => 'telephone', 'label' => 'Téléphone', 'value' => $client->telephone])
                        @include('shared.input', ['name' => 'quantite', 'label' => 'Quantité', 'value' => 1])
                    
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('accueil') }}" class="btn btn-secondary flex-fill mx-1">Annuler</a>
                            <button type="submit" class="btn btn-success flex-fill mx-1">Valider la commande</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
