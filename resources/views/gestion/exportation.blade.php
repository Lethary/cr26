@extends('layouts.default')

@section('title', 'Accueil')

@section('content')
<h2>Export du classement</h2>

<div style="display: flex; gap: 15px; margin-top: 20px;">

    <a href="{{ route('export.classement.final') }}"
       style="
            background-color: #0d6efd;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
       "
       onmouseover="this.style.backgroundColor='#0b5ed7'"
       onmouseout="this.style.backgroundColor='#0d6efd'">
        📥 Télécharger le classement final (CSV)
    </a>

</div>


@endsection
