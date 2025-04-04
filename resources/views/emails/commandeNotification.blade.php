{{-- resources/views/emails/commande_notification.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            background-color: #f4f4f4;
            padding: 20px;
        }
        .header {
            background-color: #3490dc;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nouvelle Commande Passée</h2>
        </div>

        <div class="content">
            <p><strong>Client :</strong> {{ $commande->client->nom }}</p>
            <p><strong>Produit :</strong> {{ $commande->produit->nom_produit }}</p>
            <p><strong>Quantité :</strong> {{ $commande->quantite }}</p>
        </div>

        <div class="footer">
            <p>Merci d'avoir utilisé notre service !</p>
            <p><a href="{{ url('/commandes') }}">Voir la commande</a></p>
        </div>
    </div>
</body>
</html>
