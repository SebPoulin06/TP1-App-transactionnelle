@extends('layouts/app')
@use('App\Models\Coupon')
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
                <form action="{{route('coupon.appliquer')}}" method="POST">
                    @csrf
                    <input type="text" name="code" placeholder="code promo">
                    <button type="submit">Appliquer</button>
                </form>

                @php
                    $coupon = Coupon::find(session('coupon'));
                    $rabais =$coupon ?  $coupon->calculerRabais($total):0 ;
                @endphp
                @if($coupon)
                    <p>Sous-total : {{number_format($total,2,',',' ')}} $</p>
                    <p>Code {{$coupon->code}} : -{{ number_format($rabais, 2, ',', ' ') }} $</p>
                @endif


                <h2>Total : {{ number_format($total-$rabais, 2, ',', ' ') }} $</h2>
                <form action="{{ route('stripe.payer') }}" method="POST">
                    @csrf
                    <button type="submit">Payer avec Stripe</button>
                </form>
            @endif
        </div>

    </section>

@endsection
