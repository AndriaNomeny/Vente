@extends("base")

@section("titre","Liste des Produits")

@section("contenue")

<section class="bg-light py-5">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1 fw-bold text-uppercase">Nos Produits</h1>
            <a href="{{ route('produit.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i> Ajouter un produit
            </a>
        </div>

        <div class="row">
            @foreach ($produits as $produit)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-lg h-100 d-flex flex-column">
                    <a href="shop-single.html">
                        <img src="{{ $produit->image ? $produit->image_url() : asset('assets/img/default_product.jpg') }}" 
                             class="card-img-top rounded-top" 
                             alt="{{ $produit->nom_produit }}" 
                             style="width: 100%; height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark">
                            <a href="shop-single.html" class="text-decoration-none text-dark">
                                {{ $produit->nom_produit }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ Str::limit($produit->description, 80) }}</p>

                        <ul class="list-unstyled mb-3">
                            <li><strong>Stock:</strong> <span class="text-success">{{ $produit->stock }}</span></li>
                            <li><strong>Prix:</strong> <span class="text-success">{{ number_format($produit->prix, 2) }}$</span></li>
                            <li><strong>Catégorie:</strong> {{ $produit->categorie->nom_categorie }}</li>
                            <li><strong>Statut:</strong> 
                                <span class="badge {{ $produit->vendu ? 'bg-danger' : 'bg-success' }}">
                                    {{ $produit->vendu ? 'Vendu' : 'Disponible' }}
                                </span>
                            </li>
                        </ul>

                        <div class="mt-auto d-flex justify-content-between">
                            <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('produit.delete', $produit) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
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
