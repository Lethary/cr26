<nav>
  <ul>
    <li><strong>Concours Robot</strong></li>
  </ul>

  <ul>
    <li>
      <button class="contrast">
        <a href="{{ route('home') }}">Accueil</a>
      </button>
    </li>

    <li>
      <details class="dropdown">
        <summary role="button" class="contrast">Collèges</summary>
        <ul dir="rtl">
          <li><a href="#">Élèves</a></li>
          <li><a href="#">Équipes</a></li>
        </ul>
      </details>
    </li>

    <li>
      <button class="contrast">
        <a href="#">Épreuves</a>
      </button>
    </li>

    <li>
      <button class="contrast">
        <a href="{{ route('classement') }}">Classements</a>
      </button>
    </li>

    <li>
      <details class="dropdown">
        <summary role="button" class="contrast">Éditions</summary>
        <ul dir="rtl">
          <li><a href="#">2025</a></li>
          <li><a href="#">2024</a></li>
        </ul>
      </details>
    </li>

    <li><button class="contrast">Secrétaire</button></li>

    <li>
      <details class="dropdown">
        <summary role="button" class="contrast">Gestionnaires</summary>
        <ul dir="rtl">
          <li><a href="#">Épreuves</a></li>
          <li><a href="#">Collège</a></li>
          <li><a href="#">Abonnement</a></li>
          <li><a href="#">Rôle</a></li>
          <li>
            <details class="dropdown">
              <summary role="button" class="contrast">Résultat</summary>
              <ul dir="rtl">
                <li><a href="/edition">Éditions</a></li>
                <li><a href="/exportation">Exportation</a></li>
                <li><a href="#">Modification</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </details>
    </li>

    <li>
      <details class="dropdown">
        <summary role="button" class="contrast">Admin</summary>
        <ul dir="rtl">
          <li><a href="#">Genre</a></li>
          <li><a href="#">Pays</a></li>
          <li><a href="#">Utilisateur</a></li>
        </ul>
      </details>
    </li>
    @auth
    <li>
      <button class="contrast">
        <a href="">Déconnexion</a>
      </button>
    </li>
    @else
    <li>
      <button class="contrast">
        <a href="">Connexion</a>
      </button>
    </li>
    @endauth
  </ul>
</nav>