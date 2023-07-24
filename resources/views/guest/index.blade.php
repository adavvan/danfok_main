@extends('layouts.guest')

@section('title', 'Dánfok')

@section('content')
    <section class="kayak bg-image">    
        <div class="kayak-text">
        <h1>
            NYÁRI ÉLMÉNYEK A <br> DÁNFOKI ÜDÜLŐKÖZPONTBAN!
        </h1>
        <div class="reszletek-hullam">
            <div class="reszletek"><button class="btn default" onclick="window.location.href='csomagajanlatok.php'">RÉSZLETEK</button></duv>
        </div>
        </div>
    </section>
    <section class="titleh">
        <h2>CSOMAGAJÁNLATOK</h2>
        <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
      </section>
  
      <section class="container-fluid">
        <div class="row justify-content-center">
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/osztaly.jpg');" onclick="window.location.href='osztalykirandulas.php'">
            <h3>Osztálykirándulás</h3>
          </div>
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/golya.jpg');" onclick="window.location.href='golyatabor.php'">
            <h3>Gólyatábor</h3>
          </div>
          <div class="csomag d-flex flex-column justify-content-end pointer" style="background-image: url('img/ceges.jpg');" onclick="window.location.href='cegeknek.php'">
            <h3>Cégeknek</h3>
          </div>
        </div>
      </section>
  
      <section class="container-fluid ajanlatkeres text-center">
        <h2>Ezek között nem találja amit keres?<br>Kérjen egyedi ajánlatot!</h2>
        <div class="pt-3"><button class="btna default" onclick="window.location.href='kapcsolat.php#uzenet'">Egyedi ajánlatkérés</button></div>
      </section>
@endsection