<!doctype html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Concours Robot')</title>
  <link rel="stylesheet" href="/css/pico.grey.css">
</head>
<style>
body {
  overflow-x: hidden;
}
</style>
<body>
  <div class="website">
    <header class="header" role="banner">
      @include('inc.nav')
    </header>

    <main id="main" role="main" class="main">
      @yield('content')
    </main>

    @include('inc.footer')
  </div>
</body>
</html>
