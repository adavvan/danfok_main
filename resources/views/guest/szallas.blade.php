@extends('layouts.guest')
@section('title', 'Szállásfoglalás - Dánfok')
@section('content')

<section class="titleh container-fluid">
    <h1>SZÁLLÁSFOGLALÁS</h1>
    <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
</section>
<section class="ajanlker">
    <h2>Kérjen ajánlatot kollégáinktól!</h2>
</section>

<div class="container pb-5">
    <div class="felhivas">
        <p>
            <span class="pb-5">Kedves Érdeklődő!            
        </p>
        <p>
            Szeretnénk felhívni a figyelmét, hogy áraink nem érvényesek az ünnepnapokra, hosszú hétvégékre, illetve az utószezonra.<br>
            Részletes tájékoztatásért keresse munkatársainkat elérhetőségeinken!
        </p>
    </div>
    <form action="" method="post">
        <div class="row flex-column">
            <div class="col"> 
                <h3 class="sztitle">Elérhetőségeink</h3>
                <div>
                    <label for="start">Foglalás kezdete</label><br>
                    <input type="date" name="start">
                </div>
                <div>
                    <label for="end">Foglalás vége</label><br>
                    <input type="date" name="end">
                </div>
            </div>
            <div class="col pt-5 pb-5">
                <h3 class="sztitle">Létszám megadása</h3>
                <div>
                    <label class="" for="lszam">Létszám:</label><br>
                    <input type="number" step="1" name="lszam" value="1">
                </div>
            </div>
        </div>
        <div>
            <h3 class="sztitle">Szállástípus megadása</h3>
            <div class="row text-center pt-3 pb-5">
                <div class="col d-flex flex-column">
                    <div class="szallasimg">
                        <img class="rounded-circle" src="img/panzio.png" id="panzio" onmousedown="selectType(this.id)">
                    </div>
                    <div>
                        <h4>Panzió</h4>
                        <p>2 fős szoba ára <br>8000 Ft/szoba/éj<p>
                        <p>3 fős szoba ára <br>12000 Ft/szoba/éj<p>
                        <p>Környezetvédelmi hozzájárulás:<br>+200 Ft/fő/éj</p>
                    </div>                 
                </div>
                <div class="col d-flex flex-column">
                    <div class="szallasimg">
                        <img class="rounded-circle" src="img/korhaz.png" alt="Körépület" id="korepulet" onmousedown="selectType(this.id)">
                    </div>           
                    <div>
                        <h4>Körépület</h4>
                        <p>Mnimum 10 fő esetén: 3000 Ft/fő/éj<p>
                        <p>Kevesebb, mint 10 fő esetén: 30000 Ft/egység/éj<p>
                        <p>Környezetvédelmi hozzájárulás:<br>+200 Ft/fő/éj</p>
                    </div>                    
                </div>
                <div class="col d-flex flex-column">
                    <div class="szallasimg">
                        <img class="rounded-circle" src="img/fahaz.png" id="fahaz" onmousedown="selectType(this.id)">
                    </div>
                    <div>
                        <h4>Faház</h4>
                        <p>Egységenként foglalhatóak, az egységeknek férőhelyhez mérten külön áraik vannak<p>
                        <a class="pointer" id="detailsb">Részletek:</a>
                        <div class="d-flex">
                            <table class="table justify-content-center text-center" id="fahazdetails" style="display:none">
                                <tr>
                                    <th>Ágyszám</th>
                                    <th>Egység</th>
                                    <th>Ár/egység</th>
                                </tr>
                                <tr>
                                    <td>3 ágyas</td>
                                    <td>2 db</td>
                                    <td>7200 Ft</td>
                                </tr>
                                <tr>
                                    <td>4 ágyas</td>
                                    <td>5 db</td>
                                    <td>9600 Ft</td>
                                </tr>
                                <tr>
                                    <td>5 ágyas</td>
                                    <td>4 db</td>
                                    <td>12 000 Ft</td>
                                </tr>
                                <tr>
                                    <td>6 ágyas</td>
                                    <td>1 db</td>
                                    <td>14 400 Ft</td>
                                </tr>
                                <tr>
                                    <td>8 ágyas</td>
                                    <td>8 db</td>
                                    <td>19 200 Ft</td>
                                </tr>
                                <tr>
                                    <td>10 ágyas</td>
                                    <td>1 db</td>
                                    <td>24 000 Ft</td>
                                </tr>
                                <tr>
                                    <td>12 ágyas</td>
                                    <td>3 db</td>
                                    <td>28 800 Ft</td>
                                </tr>
                            </table>
                        </div>
                        <p>Környezetvédelmi hozzájárulás:<br>+200 Ft/fő/éj</p>
                    </div>                 
                </div>
                <div class="col d-flex flex-column">
                    <div class="szallasimg">
                        <img class="rounded-circle" src="img/jurta.png" id="jurta" onmousedown="selectType(this.id)">
                    </div>
                    <div>
                        <h4>Jurta</h4>
                        <p>2000 Ft/fő/éj<p>
                        <p>Környezetvédelmi hozzájárulás:<br>+200 Ft/fő/éj</p>
                    </div>                 
                </div>
                <div class="col d-flex flex-column">
                    <div class="szallasimg">
                        <img class="rounded-circle" src="img/vendeghaz.png" id="vendeghaz" onmousedown="selectType(this.id)">
                    </div>
                    <div>
                        <h4>Vendégház</h4>
                        <p>10 fő elszállásolására alkalmas az emeleten 3 szobával, közös mosdóval és fürdőszobával, a földszinten 30 fős közösségi térrel<p>
                        <p>36000 Ft/éj<p>
                        <p>Környezetvédelmi hozzájárulás:<br>+200 Ft/fő/éj</p>
                    </div>                
                </div>
            </div>
            <input type="hidden" id="szType" name="szType" value="">
        </div>
        <h3 class="sztitle">Személyes adatok</h3>
        <div>
            <label for="nev">Név</label><br>
            <input type="text" name="nev"><br>
            <label for="tel">Telefonszám</label><br>
            <input type="text" name="tel"><br>
            <label for="email">Email</label><br>
            <input type="email" name="email"><br>
            <button class="btn btn-md btn-primary" style="margin-left: 0; margin-top: 0.6vh; background-color: #3f91ce" name="submit" type="submit" inputmode="text">AJÁNLATKÉRÉS KÜLDÉSE</button>
        </div>
    </form>
</div>

<script>
    var selectedTypes = [];
    function selectType(id)
    {
        var listItem = document.getElementById(id);
        if (listItem.classList.contains("selected"))
        {
            listItem.classList.remove("selected");
            selectedTypes = selectedTypes.filter(v => v !== id);
            document.getElementById("szType").value = selectedTypes;
        }      
        else 
        {
            listItem.classList.add("selected");
            selectedTypes.push(id);
            document.getElementById("szType").value = selectedTypes;
        }
    }

    const detailsb = document.querySelector("#detailsb");
    const fahaz = document.querySelector("#fahazdetails");
    detailsb.addEventListener("click", function(){
        if (fahaz.style.display === "none") {
            fahaz.style.display = "flex";
            } else {
                fahaz.style.display = "none";
            }
    });
</script>
@endsection