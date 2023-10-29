
@extends('layouts.guest')
@section('title', 'Osztálykirándulás - Dánfok')
@section('content')

<link rel="stylesheet" href="{{ asset('css/udulo.css') }}">
</head>

<section class="titleh container-fluid pb-5 pt-20">
    <h1>OSZTÁLYKIRÁNDULÁS</h1>
    <div class="sargahullam"><img src="{{ asset('svg/hullam_sarga-03.svg') }}"></div>
</section>

<div class="container pb-5">    
    <p style="font-size: 1.5em">
    Üdülőközpontunk kiváló célpontja az iskolai kirándulásoknak, hiszen nálunk rengeteg programlehetőséget találnak az ide érkezők!
    <br>
    <strong>Mi az, ami miatt megéri Dánfokra szervezni az osztálykirándulást?</strong> Teljesen körülkerített táborunkban több féle szálláslehetőség közül választhatnak vendégeink a létszám függvényében.
    <br>

    Többféle szállás és színes programlehetőségek  (szabad strand; röpi- és focipálya; bérelhető kerékpár, kajak, kenu, csónak és sárkányhajó; tűzrakóhely, vízi túrázás) közül válogathatnak az ide kirándulók!
    </p>
    <div class="row">
        <div class="col">
            <img src="{{ asset('img/osztaly.jpg') }}" style="width: 550px;">
        </div>
        <div class="col">
            <h2><strong>Kíváncsi vagy, hogy milyen élmények várnak rád Dánfokon? <br>Akkor tekintsd meg <a href="{{route('guest.galeria')}}">galériánkat</a>!</strong></h2>
        </div>
    </div>
</section>
</div>

@endsection