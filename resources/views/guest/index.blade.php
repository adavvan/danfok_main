@extends('layouts.guest')

@section('title', 'Dánfok')
<link rel="stylesheet" href="css/article.css"/>

@section('content')
  <div class="loading-overlay" id="loadingOverlay">
    <div class="loader"></div>
  </div>
    <section class="kayak bg-image">    
        <div class="kayak-text animate-fade-in">
        <h1>
            NYÁRI ÉLMÉNYEK A <br> DÁNFOKI ÜDÜLŐKÖZPONTBAN!
        </h1>
        <div class="reszletek-hullam animate-fade-in">
            <div class="reszletek"><button class="btn default" onclick="window.location.href='{{route('guest.csomagajanlatok')}}'">RÉSZLETEK</button></duv>
        </div>
        </div>
    </section>
    <section class="titleh pb-5">
        <h2>CSOMAGAJÁNLATOK</h2>
        <div class="sargahullam pt-3"><img src="svg/hullam_sarga-03.svg"></div>
      </section>
  
      <section class="container-fluid animate-on-scroll">
        <div class="row justify-content-center">
            <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/osztaly.jpg');" onclick="window.location.href='{{ route('guest.csomagok.osztaly') }}'">
                <h3>Osztálykirándulás</h3>
            </div>
            <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/golya.jpg');" onclick="window.location.href='{{ route('guest.csomagok.golya') }}'">
                <h3>Gólyatábor</h3>
            </div>
            <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/ceges.jpg');" onclick="window.location.href='{{ route('guest.csomagok.cegeknek') }}'">
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
      <script src="{{ asset('js/loader.js') }}"></script>
      <script src="{{ asset('js/navbar.js') }}"></script>
@endsection