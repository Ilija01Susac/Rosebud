<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Rosebud') }}</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/responsive-nav.js"></script>
  </head>
  <body>

    <header>
      <a href="#home" class="logo" data-scroll>Fixed Nav</a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="#home" data-scroll>Home</a></li>
          <li class="menu-item"><a href="#about" data-scroll>About</a></li>
          <li class="menu-item"><a href="#projects" data-scroll>Projects</a></li>
          <li class="menu-item"><a href="#blog" data-scroll>Blog</a></li>
          <li class="menu-item"><a href="http://www.google.com" target="_blank">Google</a></li>
        </ul>
      </nav>
    </header>

    <section id="home">
      <h1>Fixed Nav</h1>
      <p>The code and examples are hosted on GitHub and can be <a href="https://github.com/adtile/fixed-nav">found from here</a>. Read more about the approach from&nbsp;<a href="http://blog.adtile.me/2014/03/03/responsive-fixed-one-page-navigation/">our&nbsp;blog</a>.</p>
    </section>

    <section id="about">
      <h1>About</h1>
    </section>

    <section id="projects">
      <h1>Projects</h1>
    </section>

    <section id="blog">
      <h1>Blog</h1>
    </section>

    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>
  </body>
</html>
