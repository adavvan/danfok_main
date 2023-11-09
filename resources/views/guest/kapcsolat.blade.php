@extends('layouts.guest')
@section('title', 'Kapcsolat - Dánfok')

@section('content')
<link rel="stylesheet" href="css/kapcsolat.css"/>
<section class="titleh container-fluid pb-5 pt-20">
    <h1>KAPCSOLAT</h1>
    <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
</section>
<section class="container-fluid pb-5">
    <div class="container">
        <h2 class="highlight-blue">ELÉRHETŐSÉGEINK</h5>
    </div>
</section>
<section class="container-fluid pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm d-flex align-items-center mcenter">
                <img src="img/footer_icon_phone.png" class="circle">
                <div class="kinfo">
                    <p>+36 20/592-5636</p>
                </div>
            </div>

            <div class="col-sm d-flex align-items-center mcenter">
                <img src="img/footer_icon_email.png" class="circle">
                <div class="kinfo">
                    <p>kapcsolat@danfok.hu</p>
                </div>
                
            </div>
            <div class="col-sm d-flex align-items-center mcenter">
                <img src="img/footer_icon_adress.png" class="circle">
                <div class="kinfo">
                <p>Békés, Hrsz. 6929/50, 5630</p>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="container-fluid pt-5 pb-5">
    <div class="container">
        <h2 class="highlight-blue">KAPCSOLATFELVÉTEL</h2>
    </div>
</section>
<section class="container-fluid pb-5" id="  ">
     <div class="container">
         <form action="{{ route('contact.send') }}" method="post" class="pb-3">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4 left-side">
                    <div class="pb-2">
                        <input name="name" placeholder="Név" required="required" class="form-control" type="text" inputmode="text">
                    </div>
                    <div class="pb-2">
                        <input name="email" placeholder="E-mail" required="required" class="form-control" type="email">
                    </div>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" required="required">
                            <label>
                                Az űrlap használatával Ön tudomásul veszi és elfogadja az <a href="{{route('guest.adatkezeles')}}">Adatkezelési tájékoztatónkat</a></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 right-side">
                    <div>
                        <textarea name="message" placeholder="Üzenet" rows="5" required="required" class="form-control" cols="50" inputmode="text"></textarea>
                    </div>
                    
                </div>
                <div class="btn-wrap text-md-right pt-3">
                        <button class="btn btn-md btn-primary" type="submit" name="submit" inputmode="text">ÜZENET ELKÜLDÉSE</button>
                 </div>
            </div>
         </form>
         @if(Session::has('success'))
         <div class="alert alert-success">
             {{ Session::get('success') }}
         </div>
        @endif
        
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
     </div>
</section>

<div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.6644983998303!2d21.150096595740756!3d46.759964433287806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47468183f53f01e1%3A0x797591f018eb5cd3!2zRMOhbmZva2kgw5xkw7xsxZFrw7Z6cG9udA!5e0!3m2!1shu!2shu!4v1677936226704!5m2!1shu!2shu" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </div>
@endsection