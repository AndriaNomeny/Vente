@extends('base')

@section('titre', 'Liste des commandes')

@section('contenue')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4><i class="fas fa-list"></i> Liste des commandes</h4>
                </div>
                <div class="card-body bg-light rounded-bottom">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{ $commande->id }}</td>
                                    <td>{{ $commande->client->nom }}</td>
                                    <td>{{ $commande->produit->nom_produit }}</td>
                                    <td>{{ $commande->quantite }}</td>
                                    <td>{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.commandes.show', $commande) }}" class="btn btn-info btn-sm">Voir</a>
                                        <form action="{{ route('admin.commandes.destroy', $commande) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
