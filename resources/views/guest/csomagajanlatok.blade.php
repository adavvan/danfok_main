@extends('layouts.guest')
@section('title', 'Csomagajánlatok - Dánfok')
@section('content')
<link rel="stylesheet" href="css/article.css"/>
<div class="wrapper pt-20">
    <section class="titleh container-fluid">
        <h1>CSOMAGAJÁNLATOK</h1>
        <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
    </section>

    <section class="articles pt-5">
        <div class="container d-flex justify-content-center">
            <div class="post mb-5 d-flex flex-column flex-md-row flex-lg-row">
                <div class="post-img" style="background-image: url({{ asset('img/osztaly.jpg') }})"></div>
                <div class="post-body cs-post-body pt-4">
                    <h3 class="hb post-title text-center"><a href="{{ route('guest.csomagok.osztaly') }}">Osztálykirándulás</a></h3>
                    <p>Üdülőközpontunk kiváló célpontja az iskolai kirándulásoknak, hiszen nálunk rengeteg programlehetőséget találnak az ide érkezők!</p>
                    <a href="{{ route('guest.csomagok.osztaly') }}" class="cs-details">Bővebben...</a> 
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="post mb-5 d-flex flex-column flex-md-row flex-lg-row">
                <div class="post-img" style="background-image: url({{ asset('img/golya.jpg') }})"></div>
                <div class="post-body cs-post-body pt-4">
                    <h3 class="hb post-title text-center"><a href="{{ route('guest.csomagok.golya') }}">Gólyatábor</a></h3>
                    <p>Körülkerített táborunk az egyik legjobb célpont egy emlékezetes gólyatáborhoz!</p>
                    <a href="{{ route('guest.csomagok.golya') }}" class="cs-details">Bővebben...</a> 
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="post mb-5 d-flex flex-column flex-md-row flex-lg-row">
                <div class="post-img" style="background-image: url({{ asset('img/ceges.jpg') }})"></div>
                    <div class="post-body cs-post-bodypt-4">
                        <h3 class="hb post-title text-center"><a href="{{ route('guest.csomagok.cegeknek') }}">Cégeknek</a></h3>
                        <p>Különleges helyszínt keres csapatépítő összejövetelének? Kollégái nálunk egyszerre pihenhetnek nyugodt, természetközeli környezetben, és kapcsolódhatnak ki aktívan!</p>
                        <a href="{{ route('guest.csomagok.cegeknek') }}" class="cs-details">Bővebben...</a> 
                    </div>
            </div>
        </div>
    </section>
</div>
@endsection