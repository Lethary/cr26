<?php 
if (request()->is('/')) {
    // Aside pour la page d'accueil
    echo '
    <aside class="aside">
    <nav class="navigation" role="navigation">
      <ul class="navigation-list">
        <li class="navigation-item"><a class="navigation-link" href="">Les équipes</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Les épreuves</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Consultation résultat</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Inscription</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Saisie résultat</a></li>
        <li class="navigation-item"><a class="navigation-link" href="mentions">Mentions Légales</a></li>
      </ul>
    </nav>
  </aside>';
} else {
    // Aside pour les autres pages
    echo '
    <aside class="aside">
    <nav class="navigation" role="navigation">
      <ul class="navigation-list">
        <li class="navigation-item"><a class="navigation-link" href="/">Accueil</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Les équipes</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Les épreuves</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Consultation résultat</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Inscription</a></li>
        <li class="navigation-item"><a class="navigation-link" href="">Saisie résultat</a></li>
        <li class="navigation-item"><a class="navigation-link" href="mentions">Mentions Légales</a></li>
      </ul>
    </nav>
  </aside>';
}


?>