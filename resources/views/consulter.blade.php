<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Liste des élèves</title>
    <link rel="stylesheet" href="/css/pico.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('includes.header')

    <main>
        <h1>Élèves inscrits</h1>

        <!-- Messages -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <ul style="list-style: none; padding: 0;">
            @foreach($eleves as $eleve)
            <li style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5em;">
                <!-- Texte de l'élève -->
                <div>
                    {{ $eleve->prenom }} {{ $eleve->nom }} - Classe : {{ $eleve->classe }}
                </div>

                <!-- Conteneur des boutons -->
                <div style="display: flex; gap: 0.5em; align-items: center;">
                    <!-- Modifier -->
                    <form action="{{ route('modification_eleve', $eleve->id) }}" method="GET" style="margin: 0; padding: 0; display: inline;">
                        <button type="submit" style="min-width: 90px; padding: 0.3em 0.5em; background-color: #000000ff; color: white; border: none; border-radius: 4px; cursor: pointer; margin: 0;">
                            Modifier
                        </button>
                    </form>

                    <!-- Supprimer -->
                    <form action="{{ route('colleges.eleves') }}" method="POST" style="margin: 0; padding: 0; display: inline;"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer cet élève ?');">
                        @csrf
                        <input type="hidden" name="delete_id" value="{{ $eleve->id }}">
                        <button type="submit" style="min-width: 90px; padding: 0.3em 0.5em; background-color: #c91224ff; color: white; border: none; border-radius: 4px; cursor: pointer; margin: 0;">
                            Supprimer
                        </button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>

    </main>


    @include('includes.footer')
</body>

</html>