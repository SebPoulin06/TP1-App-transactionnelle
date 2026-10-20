@extends('layouts/app')

@section('titre', 'Climbly - Produits')

@section('content')

    <section class="catalogue">

        <h1>Nos produits:</h1>

        <p class="catalogue-intro">Équipe-toi pour ta prochaine ascension !</p>

        <div class="produits-grid">
            @@forelse($produits as $produit)
                <div class="produit-card">
                    <img src="{{asset('images/produits/' . $produit->image)}}" alt="{{$produit->nom}}" class="produit-image">
                    <div class="produit-info">
                        <h2>{{ $produit->nom }}</h2>

                        <p class="produit-description">{{ $produit->description }}</p>

                        <p class="produit-prix">{{ number_format($produit->prix, 2, ',', ' ') }} $</p>
                    </div>
                </div>

            @empty
                <p>Aucun produit disponible pour le moment.</p>
            @endforelse
        </div>
    </section>
@endsection

