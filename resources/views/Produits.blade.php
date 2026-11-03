@extends('layouts/app')

@section('titre', 'Climbly - Produits')

@section('content')

    <section class="catalogue">

        <h1>Nos produits:</h1>

        <p class="catalogue-intro">Équipe-toi pour ta prochaine ascension !</p>

        <div class="produits-grid">
            @forelse($produits as $produit)
                <div class="produit-card">
                    <img src="{{asset('images/produits/' . $produit->image)}}" alt="{{$produit->nom}}" class="produit-image">
                    <div class="produit-info">

                        <p class="produit-compagnie">{{ $produit->marque }}</p>

                        <h2>{{ $produit->nom }}</h2>

                        <p class="produit-description">{{ $produit->description }}</p>
                        <p class="produit-description"> Quantité en stock : {{ $produit->stock }}</p>
                        <p class="produit-description">Taille : {{ $produit->taille }}</p>

                        <p class="produit-prix">{{ $produit->getPrixFormateAttribute() }} $</p>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <label>Quantité :</label>
                            <input type="number" name="quantite" value="1" min="1" max="10">
                            <button type="submit">Ajouter au panier</button>
                        </form>
                    </div>
                </div>

            @empty
                <p>Aucun produit disponible pour le moment.</p>
            @endforelse
        </div>
    </section>
@endsection

