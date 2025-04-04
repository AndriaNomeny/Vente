@extends("base")
@section("titre", $produit->exists ? "Modifier produit" : "Créer produit")
@section("contenue")

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4>{{ $produit->exists ? 'Modifier' : 'Créer' }} un produit</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <form method="post" 
                          action="{{ $produit->exists ? route('produit.update', $produit->id) : route('produit.store') }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @if($produit->exists)
                            @method('PUT') 
                        @endif

                        <div class="mb-4">
                            @include('shared.input', [
                                'name' => 'nom',
                                'label' => 'Nom du produit',
                                'placeholder' => 'Entrez le nom du produit...',
                                'value' => old('nom', $produit->nom_produit ?? ''),
                                'class' => 'form-control form-control-lg shadow-sm rounded-3'
                            ])
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Image du produit</label>
                            <input type="file" name="image" class="form-control shadow-sm rounded-3">
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                            @if($produit->exists && $produit->image)
                                <div class="mt-2">
                                    <img src="{{ $produit->image_url() }}" alt="Image actuelle" class="img-thumbnail rounded shadow-sm" width="100">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            @include('shared.select', [
                                'name' => 'categorie_id',
                                'label' => 'Catégorie',
                                'options' => $categories,
                                'class' => 'form-control form-control-lg shadow-sm rounded-3'
                            ])
                        </div>

                        <div class="mb-4">
                            @include('shared.input', [
                                'name' => 'description',
                                'label' => 'Description',
                                'placeholder' => 'Décrivez le produit...',
                                'value' => old('description', $produit->description ?? ''),
                                'type' => 'textarea',
                                'class' => 'form-control shadow-sm rounded-3'
                            ])
                        </div>

                        <div class="mb-4">
                            @include('shared.input', [
                                'name' => 'prix',
                                'label' => 'Prix',
                                'value' => old('prix', $produit->prix ?? 0),
                                'type' => 'number',
                                'class' => 'form-control shadow-sm rounded-3'
                            ])
                        </div>

                        <div class="mb-4">
                            @include('shared.input', [
                                'label' => 'Stock (Actuel : ' . $produit->stock . ')',
                                'name' => 'stock',
                                'value' => old('stock', 0),
                                'type' => 'number',
                                'class' => 'form-control shadow-sm rounded-3'
                            ])
                        </div>

                        @if($produit->exists)
                            <div class="mb-4">
                                @include('shared.input', [
                                    'label' => 'Stock (facultatif au cas ou vous faites erreur sur l\'ajout du stock)',
                                    'name' => 'stockEnleve',
                                    'value' => old('stockEnleve'),
                                    'type' => 'number',
                                    'class' => 'form-control shadow-sm rounded-3'
                                ])
                            </div>
                        @endif

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm rounded-3 hover-effect">
                                {{ $produit->exists ? 'Modifier' : 'Créer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
