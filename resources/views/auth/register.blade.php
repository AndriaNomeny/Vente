<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h4><i class="fas fa-user-plus"></i> Inscription</h4>
                    </div>
                    <div class="card-body bg-light rounded-bottom">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <!-- Nom -->
                            <div class="form-group mb-4">
                                <label for="name" class="form-label font-weight-bold">Nom</label>
                                <input type="text" class="form-control mt-1 shadow-sm rounded-3 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Entrez votre nom" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Email -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label font-weight-bold">Email</label>
                                <input type="email" class="form-control mt-1 shadow-sm rounded-3 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Mot de passe -->
                            <div class="form-group mb-4">
                                <label for="password" class="form-label font-weight-bold">Mot de passe</label>
                                <input type="password" class="form-control mt-1 shadow-sm rounded-3 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Entrez votre mot de passe">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Confirmer le mot de passe -->
                            <div class="form-group mb-4">
                                <label for="password_confirmation" class="form-label font-weight-bold">Confirmer le mot de passe</label>
                                <input type="password" class="form-control mt-1 shadow-sm rounded-3 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Bouton d'inscription -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg px-4 py-2 shadow-sm hover-effect">
                                    S'inscrire
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>