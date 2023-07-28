
@extends('layouts.guest')
@section('title', 'Cégeknek - Dánfok')
@section('content')

<link rel="stylesheet" href="{{ asset('css/udulo.css') }}">

<div class="wrapper">
    <section class="titleh container-fluid pb-5 pt-20">
        <h1>CÉGEKNEK</h1>
        <div class="sargahullam"><img src="{{ asset('svg/hullam_sarga-03.svg') }}"></div>
    </section>
        <div class="container">
        <p>Különleges helyszínt keres csapatépítő összejövetelének? Kollégái nálunk egyszerre pihenhetnek nyugodt,
            természetközeli környezetben, és kapcsolódhatnak ki aktívan!</p>
        <p>
        Töltsenek pár napot Békés-Dánfokon munkatársaival, és garantáltan visszajáró vendégek lesznek nálunk!
        Minden csapatépítés fontos eleme a helyszín, de sok szempont van, aminek meg kell felelnie. Ilyenek például a kényelmes szállás, a színes programlehetőségek, és a megszokott környezetből való kiszakadás. Nálunk mindezt megkaphatja!
        </p>
        <p>Egy focimeccs a kollégákkal? Közös sárkányhajózás a Kettős-Körös vadregényes kanyarulataiban,
            vagy egy esti sütögetés? A Dánfoki Üdülőközpontban ezekre mind lehetősége nyílik.</p>
        </div>
</div>
@endsection