
@extends('layouts.guest')
@section('title', 'Gólyatábor - Dánfok')

@section('content')
<link rel="stylesheet" href="{{ asset('css/udulo.css') }}">

<div class="wrapper">
    <section class="titleh container-fluid pb-5 pt-20">
        <h1>GÓLYATÁBOR</h1>
        <div class="sargahullam"><img src="{{ asset('svg/hullam_sarga-03.svg') }}"></div>
    </section>
        <div class="container">
        <p>Körülkerített táborunk az egyik legjobb célpont egy emlékezetes gólyatáborhoz!</p>
        <p>Azoknak a fiataloknak ajánljuk figyelmébe üdülőközpontunkat, akik olyan helyet keresnek,
            ahol megszervezhetnek egy mozgalmas tábort biztonságos környezetben. Nálunk minden adott a felejthetetlen pillanatokhoz:
            tágas táborunk szabad stranddal, röpi- és focipályával, és még számos programelemmel várja a diákokat!
            Nálunk az esti bulikról sem kell lemondani, hiszen akár rendezvénysátor felállítására is lehetőséget biztosítunk. </p>
        <p><span class="highlight-yellow">Hogy ezeken túl miért  válaszd még Dánfokot?</span></p>
        <p>Mivel a különböző szállástípusainkban összesen több mint 200 fő elhelyezését tudjuk gond nélkül biztosítani,  ezért a nagyobb létszámú, kari gólyatáborok esetén is kiváló választás lehet üdülőközpontunk.</p>
        </div>
</div>
@endsection