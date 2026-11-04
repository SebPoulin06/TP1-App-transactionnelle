@extends ('layouts.app')

@section('titre', 'Climbly - Historique des achats')

@section('content')

    <section class="historique">
        <h1>Mes achats</h1>

        @forelse($commandes as $commande)
            <div class="commande-card">
                <div class="commande-header">
                    <h2>Commande #{{ $commande->id }}</h2>
                    <p>{{ $commande->date }}</p>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($commande->produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->pivot->quantite }}</td>
                                <td>{{number_format($produit->pivot->prix_unitaire, 2, ',', ' ')}} $</td>
                                <td>{{number_format($produit->pivot->prix_unitaire * $produit->pivot->quantite, 2, ',', ' ')}} $</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="commande-footer">
                    <strong>Total : {{ number_format($commande->prix_total,2, ',', ' ') }} $</strong>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="5">Vous n'avez encore effectué aucun achat.</td>
            </tr>
        @endforelse
    </section>

@endsection
