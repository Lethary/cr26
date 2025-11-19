@extends('layouts.default')

@section('title', 'Accueil')
@section('content')
<h1> Édition du classement </h1>
<div class="grid">
<div></div>

    <div>
        <form action="{{ route('classement.publish') }}" method="POST">
            @csrf
            @if($concour->en_cours == 1)
            <button disabled>Publier le classement (bloqué)</button>
            @else
            <button type="submit">Publier le classement</button>
            @endif

        </form>
    </div>
    <div>
        <form action="{{ route('concours.block') }}" method="POST">
            @csrf
            <button type="submit">Bloquer la saisie</button>
        </form>
    </div>
    <div></div>
</div>
@endsection