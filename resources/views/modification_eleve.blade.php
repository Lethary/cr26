<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Élève</title>

    <!-- Feuilles de style -->
    <link rel="stylesheet" href="/css/pico.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="wrapper">

        <!-- Header -->
        @include('includes.header')

        <!-- Contenu principal -->
        <main class="main-content">
            <section class="inscription-eleve">
                <div class="form-container">
                    <h2>Modification élève</h2>

                    <form action="{{ route('modification_eleve.update', $eleve->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" 
                                   value="{{ old('prenom', $eleve->prenom) }}" 
                                   placeholder="Entrer le prénom" required>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" 
                                   value="{{ old('nom', $eleve->nom) }}" 
                                   placeholder="Entrer le nom" required>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select id="genre" name="genre" required>
                                <option value="">Sélectionner</option>
                                <option value="F" {{ old('genre', $eleve->code_genre) == 'F' ? 'selected' : '' }}>Féminin</option>
                                <option value="H" {{ old('genre', $eleve->code_genre) == 'H' ? 'selected' : '' }}>Masculin</option>
                                <option value="I" {{ old('genre', $eleve->code_genre) == 'I' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" 
                                   value="{{ old('email', $eleve->email) }}" 
                                   placeholder="exemple@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="classe">Classe</label>
                            <input type="text" id="classe" name="classe" 
                                   value="{{ old('classe', $eleve->classe) }}" 
                                   placeholder="Entrer la classe" required>
                        </div>

                        <div class="grid">
                            <button type="submit" class="btn-enregistrer">Enregistrer</button>
                            <button type="button" onclick="window.history.back()">Annuler</button>
                        </div>
                    </form>

                </div>
            </section>
        </main>

        <!-- Footer -->
        @include('includes.footer')

    </div>
</body>

</html>
