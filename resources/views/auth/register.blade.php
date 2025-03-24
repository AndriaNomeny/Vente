<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<h2>Connexion</h2>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{route('register')}}" method="POST">
    @csrf
    <label>Nom :</label>
    <input type="text" name="name" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">S'inscrir</button>
</form>

</body>
</html>
