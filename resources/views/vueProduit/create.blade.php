@extends("base")
@section("titre", "Créer produit")
@section("contenue")

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Créer un produit</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('produit.store', $produit)}}" enctype="multipart/form-data">
                        @csrf  <!-- Ajoutez le token CSRF pour la sécurité -->
                        @method('put')

                        <div class="row mb-3 justify-content-center">
                            <div class="form-group col-12">
                                @include('shared.input', [
                                    'name' => 'nom',
                                    'label' => 'Nom du produit',
                                    'placeholder' => 'Entrez le nom du produit...',
                                    'value' => old('nom', $produit->nom_produit),
                                    'class' => 'form-control form-control-lg mx-auto'
                                ])
                                @error('nom_produit')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            @include('shared.input', [
                                'name' => 'image',
                                'label' => 'Image du produit',
                                'placeholder' => 'Choisir une image...',
                                'value' => old('image', $produit->image),
                                'type' => 'file',
                                'class' => 'form-control mx-auto'
                            ])
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @include('shared.select', [
                                'name' => 'categorie_id',
                                'label' => 'Catégorie',
                                'options' => $categories,
                                'class' => 'form-control form-control-lg mx-auto'
                            ])
                            @error('categorie_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @include('shared.input', [
                                'name' => 'description',
                                'label' => 'Description',
                                'placeholder' => 'Décrivez le produit...',
                                'value' => old('description', $produit->description),
                                'type' => 'textarea',
                                'class' => 'form-control mx-auto'
                            ])
                            @error('description')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row justify-content-center">
                            <div class="col text-center mt-2">
                                <button type="submit" class="btn btn-success btn-lg px-4">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
