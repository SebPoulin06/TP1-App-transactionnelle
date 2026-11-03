@extends ('layouts.app')

@section('titre', 'Climbly - Historique des achats')

@section('content')

    <section class="historique">
        <h1>Mes achats</h1>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Sous-total</th>
                </tr>
            </thead>

            <tbody>
                @forelse($commandes as $commande)
                    @foreach($commandes->produits as $produit)
                        <tr>
                            <td>{{ $commande->date }}</td>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->pivot->quantite }}</td>
                            <td>{{number_format($produit->pivot->prix_unitaire, 2, ',', ' ')}} $</td>
                            <td>{{number_format($produit->pivot->prix_unitaire * $produit->pivot->quantite, 2, ',', ' ')}} $</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5">Vous n'avez encore effectué aucun achat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

@endsection
