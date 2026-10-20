@extends('layouts/app')

@section('titre', 'Climbly - Produits')

@section('content')

    <h2>Nos produits:</h2>

    @foreach($produits as $produit)
        <div>
            <img src="{{asset('images/produits' . $produit->image)}}" alt="{{$produit->nom}}">
            <h2>{{$produit->nom}}</h2>
            <p>Prix : {{$produit->prix}}</p>
            <p>{{$produit->description}}</p>
        </div>
    @endforeach

    @forelse ($produits as $produit)
        <h2>{{ $produit->nom }}</h2>
        <p>{{ $produit->prix }} $</p>
    @empty
        <p>Aucun produit disponible pour le moment.</p>
    @endforelse

@endsection

