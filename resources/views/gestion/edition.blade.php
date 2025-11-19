@extends('layouts.default')

@section('title', 'Accueil')
@section('content')
<h1> Édition du classement </h1>
<button id="updateRankingButton">Mettre à jour le classement</button>
<button id="exportRankingButton">Publier le classement</button>

<div class="grid">
    <div></div>
    <div>
        <form action="{{ route('concours.block') }}" method="POST">
            @csrf
            <button type="submit">Bloquer la saisie</button>
        </form>
    </div>
    <div></div>
</div>
@endsection