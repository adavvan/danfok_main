@extends('layouts.guest')

@section('title', 'Dánfok')
<link rel="stylesheet" href="css/article.css"/>

@section('content')
    <section class="kayak bg-image animated-fade-in">    
        <div class="kayak-text">
        <h1>
            NYÁRI ÉLMÉNYEK A <br> DÁNFOKI ÜDÜLŐKÖZPONTBAN!
        </h1>
        <div class="reszletek-hullam">
            <div class="reszletek"><button class="btn default" onclick="window.location.href='csomagajanlatok.php'">RÉSZLETEK</button></duv>
        </div>
        </div>
    </section>
    <section class="titleh pb-5">
        <h2>CSOMAGAJÁNLATOK</h2>
        <div class="sargahullam pt-3"><img src="svg/hullam_sarga-03.svg"></div>
      </section>
  
      <section class="container-fluid">
        <div class="row justify-content-center">
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/osztaly.jpg');" id="osztalykirandulas">
            <h3>Osztálykirándulás</h3>
          </div>
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/golya.jpg');" id="golyatabor">
            <h3>Gólyatábor</h3>
          </div>
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/ceges.jpg');" id="cegeknek">
            <h3>Cégeknek</h3>
          </div>
        </div>
    </section>
  
      <section class="container-fluid ajanlatkeres text-center">
        <h2>Ezek között nem találja amit keres?<br>Kérjen egyedi ajánlatot!</h2>
        <div class="pt-3"><button class="btna default" onclick="window.location.href='kapcsolat.php#uzenet'">Egyedi ajánlatkérés</button></div>
      </section>

      <section class="articles titleh pb-5">
        <h2>AKTUÁLIS HÍREINK</h2>
        <div class="sargahullam pb-5 pt-3"><img src="svg/hullam_sarga-03.svg"></div>
        @foreach ($articles as $article)
          <div class="container d-flex justify-content-center">
              <div class="post mb-3 d-flex flex-column flex-md-row flex-lg-row">
                      <div class="post-img" style="background-image: url({{ asset('storage/' . $article->cover_image) }})">
                      </div>
                      <div class="post-body">
                          <h3 class="post-title"><a href="{{ route('guest.hir', $article->id) }}">{{ $article->title }}</a></h3>
                          <p>{{ substr(strip_tags($article->content),0,100) . "..." }}</p>
                          <span class="post-date">
                              {{$article->created_at}} 
                          </span>
                          <a href="{{ route('guest.hir', $article->id) }}" class="details">Bővebben...</a> 
                      </div>
                  </div>  
              </div>
          @endforeach
      </section>
      <script>
      // Function to slide in the "csomag" elements using Anime.js when they are in the viewport
      function slideInPackagesOnScroll() {
        const csomagElements = document.querySelectorAll('.csomag');
        const windowHeight = window.innerHeight;
        const alreadyAnimatedClass = 'animated-slide-in';

        csomagElements.forEach((csomag) => {
          const csomagRect = csomag.getBoundingClientRect();
          const triggerPoint = csomagRect.top;
          const isAlreadyAnimated = csomag.classList.contains(alreadyAnimatedClass);

          function slideIn() {
            anime({
              targets: csomag,
              translateX: ['-50px', '0'], // Slide in from the left
              opacity: [0, 1], // Fade in
              easing: 'easeInOutSine', // Set the easing function
              duration: 1000, // Animation duration in milliseconds
            });
            csomag.classList.add(alreadyAnimatedClass);
          }

          if (!isAlreadyAnimated && triggerPoint <= windowHeight) {
            slideIn();
          } else if (isAlreadyAnimated && triggerPoint > windowHeight) {
            csomag.style.opacity = 0; // Reset opacity if the element is above the trigger point
          }
        });
      }

      // Call the function to slide in the packages when the page is loaded and when scrolling
      window.addEventListener('load', slideInPackagesOnScroll);
      window.addEventListener('scroll', slideInPackagesOnScroll);
      </script>
@endsection