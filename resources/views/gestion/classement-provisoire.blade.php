@extends('layouts.default')

@section('title', 'Classement provisoire')

@section('content')
<h1>Classement provisoire</h1>

<p style="color: orange;">
    Ce classement est provisoire : il est recalculé à chaque consultation.
</p>

<table border="1" cellpadding="5">
    <tr>
        <th>Équipe</th>
        <th>Score total</th>
        <th>Collège</th>
    </tr>

    @foreach ($scores as $score)
        <tr>
            <td>{{ $score->equipe->nom }}</td>
            <td>{{ $score->score_total }}</td>
            <td>{{ $score->equipe->college->nom }}</td>
        </tr>
    @endforeach
</table>
@endsection
