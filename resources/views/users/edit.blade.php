@extends("base")
@section("titre", "Modifier l'utilisateur")
@section("contenue")

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4><i class="fas fa-user-edit"></i> Modifier l'utilisateur</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <!-- Formulaire pour modifier l'utilisateur -->
                    <form action="{{ route('utilisateur.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        @include('shared.input', [
                            'name' => 'name',
                            'value' => old('name', $user->name),
                            'type' => 'text',
                            'placeholder' => 'Entrez le nom de l\'utilisateur'
                        ])
                        
                        <!-- Email -->
                        @include('shared.input', [
                            'name' => 'email',
                            'value' => old('email', $user->email),
                            'type' => 'email',
                            'placeholder' => 'Entrez l\'email de l\'utilisateur'
                        ])
                        
                        <!-- Mot de passe -->
                        @include('shared.input', [
                            'name' => 'password',
                            'label' => 'Mot de passe',
                            'value' => old('password'),
                            'type' => 'password',
                            'placeholder' => 'Entrez un mot de passe (facultatif)'
                        ])

                        <!-- Confirmer le mot de passe -->
                        @include('shared.input', [
                            'name' => 'password_confirmation',
                            'label' => 'Confirmer le mot de passe',
                            'value' => old('password'),
                            'type' => 'password',
                            'placeholder' => 'Confirmez le mot de passe'
                        ])

                        <!-- Bouton de soumission -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm hover-effect">
                                <i class="fas fa-save"></i> Mettre à jour
                            </button>
                        </div>

                        <!-- Annuler -->
                        <div class="mt-3 text-center">
                            <a href="{{ route('utilisateur.index') }}" class="btn btn-outline-danger btn-lg shadow-sm">
                                <i class="fas fa-times-circle"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
