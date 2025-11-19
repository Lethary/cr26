@extends('layouts.default')

@section('title', 'Saisie bloquée')

@section('content')
<div class="grid">
    <div></div>
    <div>
        <h1 style="color: red;">⚠️ Saisie bloquée</h1>

        <p>
            La saisie des résultats est actuellement <strong>bloquée</strong>
            @if($concour)
            car le concours <strong>{{ $concour->nom }}</strong> est terminé.
            @else
            car aucun concours actif n’a été trouvé.
            @endif
        </p>

        <p>
            Merci de revenir plus tard.
        </p>

        <a href="{{ route('home') }}" style="text-decoration: underline;">Retourner à l'accueil</a>
    </div>
    <div></div>
</div>
@endsection