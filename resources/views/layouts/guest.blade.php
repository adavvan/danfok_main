<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dánfok')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" aria-label="">
        <div class="container-fluid nav-container">
          <!-- Logo -->
          <a class="navbar-brand" href="/">
            <img src="{{ asset('svg/logo-white.svg') }}" alt="Logo">
          </a>
          <!-- Hamburger Icon for Mobile (Top Right) -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Centered Navbar Links -->
          <div class="collapse navbar-collapse justify-content-between" id="navbarsExample03">
            <div class=""></div>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <!-- Add your navbar links here -->
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('udulokozpont')) ? 'active' : '' }}" href="{{ route('guest.udulo') }}">ÜDÜLŐKÖZPONT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('csomagajanlatok')) ? 'active' : '' }}" href="csomagajanlatok.php">CSOMAGAJÁNLATOK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('szallasfoglalas')) ? 'active' : '' }}" href="{{ route('guest.szallas') }}">SZÁLLÁSFOGLALÁS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('hirek')) ? 'active' : '' }}" href="{{ route('guest.hirek') }}">HÍREK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('galeria')) ? 'active' : '' }}" href="{{ route('guest.galeria') }}">GALÉRIA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('kapcsolat')) ? 'active' : '' }}" href="{{ route('guest.kapcsolat') }}">KAPCSOLAT</a>
              </li>
            </ul>
            <div class="social-icons">
              <a class="social-icon" href="#" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="social-icon" href="#" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="social-icon" href="#" target="_blank">
                <i class="fab fa-tiktok"></i>
              </a>
            </div>
          </div>
          <!-- Social Icons -->
        </div>
      </nav>
    </header>
    <main>
      <!-- The main content of the page will be included here --> @yield('content')
    </main>
    <footer class="footer container-fluid">
      <div class="row pt-5">
        <div class="col-12 col-md-6 footer_left d-flex justify-content-center pb-5">
          <div>
            <img src="{{ asset('svg/logo-white.svg') }}">
            <p>Minden jog fenntartva! © 2023.</p>
            <p>Szálláshely típusa: Közösségi szálláshely <br>NTAK regisztracios szám: KO241001192 </p>
          </div>
        </div>
        <div class="col-12 col-md-6 footer_right d-flex justify-content-center ">
          <div class="d-flex justify-content-center">
            <div class="footerinfo">
              <div class="kapcsolat ">
                <p>Kapcsolat</p>
                <img src="{{ asset('svg/small_wave.svg') }}">
              </div>
              <div class="footer_icon d-flex align-items-center">
                <img src="{{ asset('img/footer_icon_phone.png') }}">
                <p>+36 20 592 5636</p>
              </div>
              <div class="footer_icon d-flex align-items-center">
                <img src="{{ asset('img/footer_icon_email.png') }}">
                <p>udulokozpont@gmail.com</p>
              </div>
              <div class="footer_icon d-flex align-items-center">
                <img src="{{ asset('img/footer_icon_adress.png') }}">
                <p>Békés, Hrsz. 6929/50, 5630</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{ asset('js/loader.js') }}"></script>
    <script src="{{ asset('js/animations.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
  </body>
</html>