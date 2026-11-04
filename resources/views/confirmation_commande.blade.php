
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1c2924;">

    <h1>Merci pour votre achat chez Climbly!</h1>

    <p>Votre paiement a été confirmé.</p>

    <h2>Commande #{{ $commande->id }}</h2>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th style="text-align: left;">Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
        </thead>

        <tbody>
        @foreach($commande->produits as $produit)
            <tr>
                <td>{{ $produit->nom }}</td>
                <td style="text-align: center;">{{ $produit->pivot->quantite }}</td>
                <td style="text-align: right;">{{ number_format($produit->pivot->prix_unitaire,2, ',', ' ') }} $</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Total :{{ number_format($commande->prix_total, 2, ',', ' ') }} $</h2>

    <p>Merci de faire confiance à Climbly!</p>

</body>
</html>
