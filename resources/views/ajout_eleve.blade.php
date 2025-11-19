<html lang="fr" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Concours de Robots 2025</title>
  
  <!-- Feuilles de style -->
  <link rel="stylesheet" href="/css/pico.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="wrapper">

    <!-- En-tête -->
    @include('includes.header')
    
    <!-- Contenu principal -->
    <main class="main-content">
      <section class="inscription-eleve">
        <div class="form-container">
          <h2>Inscription élève</h2>

          {{-- Message de succès --}}
          @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif

          {{-- Message d'erreur --}}
          @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          {{-- Erreurs de validation --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('ajout_eleve') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" id="prenom" name="prenom" placeholder="Entrer le prénom" value="{{ old('prenom') }}" required>
            </div>

            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}" required>
            </div>

            <div class="form-group"> 
              <label for="genre">Genre</label> 
              <select id="genre" name="genre" required> 
                <option value="">Sélectionner</option>
                 <option value="F">Féminin</option> 
                 <option value="H">Masculin</option> 
                 <option value="I">Autre</option> 
                </select> </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="exemple@email.com" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
              <label for="classe">Classe</label>
              <input type="text" id="classe" name="classe" placeholder="Entrer la classe" value="{{ old('classe') }}" required>
            </div>

            <div class="grid">
              <button type="submit" class="btn-enregistrer">Enregistrer</button>
              <button type="button" onclick="window.history.back()">Annuler</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <!-- Pied de page -->
    @include('includes.footer')
  </div>
</body>

</html>
