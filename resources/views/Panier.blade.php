@extends('layouts/app')

@section('titre', 'Climbly - Panier')

@section('content')

    <section class="panier">

        <h1>Votre panier :</h1>

        @php
            $panier = session('panier', []);
            $total = 0;
        @endphp

        <div class="panier-contenu">
            @forelse($panier as $id => $produit)

                @php
                    $sousTotal = $produit['prix'] * $produit['quantite'];
                    $total += $sousTotal;
                @endphp

                <div class="panier-produit">
                    <h2>{{ $produit['nom'] }}</h2>
                    <p>Prix : {{ number_format($produit['prix'], 2, ',', ' ') }} $</p>
                    <p>Quantité : {{ $produit['quantite'] }}</p>
                    <p>Sous-total : {{ number_format($sousTotal, 2, ',', ' ') }} $</p>

                    <form action="{{ route('panier.supprimer', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-supprimer">Supprimer</button>
                    </form>
                </div>

            @empty

                <p class="panier-vide">Votre panier est vide.</p>

            @endforelse

            @if(!empty($panier))
                <h2>Total : {{ number_format($total, 2, ',', ' ') }} $</h2>
                <form action="{{ route('stripe.payer') }}" method="POST">
                    @csrf
                    <button type="submit">Payer avec Stripe</button>
                </form>
            @endif
        </div>

    </section>

@endsection
