<?php

    session_start();
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>LoLFire</title>
    <meta name="description" content="Grasz w League of Legends i szukasz nowych buildów lub innej pomocy? Ta strona jest właśnie dla Ciebie!"/>
    <meta name="keywords" content="league, of, legends, build, buildy, builds, counter"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
 	<link rel="stylesheet" type="text/css" href="styles/main.css">
 	<link rel="stylesheet" type="text/css" href="styles/content.css">
</head>
<body>
    <div id="container">
		<div class="menu">
            <div class="logo">
                <a href="index.php"><img src="images/logo2.png" class="logo" alt="lolfire_logo"></a>
			</div>
			<div class="drop_down">
				<button class="drop_button">Konto</button>
				<div class="drop_down-content">
					<a href="a11">Ustawienia konta</a>
					<a href="a12">Moje buildy</a>
				</div>
			</div>
			<div class="drop_down">
				<a href="heroes.php"><button class="drop_button">Bohaterowie</button></a>
				<div class="drop_down-content">
					<a href="a21">Znajdź bohatera</a>
					<a href="a22">Porównaj </a>
					<a href="a23">*Dodaj</a>
				</div>
			</div>
			<div class="drop_down">
				<button class="drop_button">Przedmioty</button>
				<div class="drop_down-content">
					<a href="a31">Znajdź</a>
					<a href="a32">Porównaj</a>
					<a href="a33">*Dodaj</a>
				</div>
			</div>
			<div class="drop_down">
				<button class="drop_button">Mapy</button>
				<div class="drop_down-content">
					<a href="sum_rift.php">Summoners Rift</a>
					<a href="tw_treeline.php">Twisted Treeline</a>
					<a href="hol_abbys.php">Hollowing Abbys</a>
				</div>
			</div>
			<div class="drop_down">
				<button class="drop_button">Skórki</button>
				<div class="drop_down-content">
					<a href="a51">a51</a>
					<a href="a52">a52</a>
					<a href="a53">a53</a>
				</div>
			</div>
		</div>
		<div class="content">
            <h1>Summoner's Rift</h1>
            <hr>
            <img class="content_image" src="images/summoners_rift_1.jpg" alt="summoners_rift_1">
            <p>
                Summoner's Rift (tłum. Rozpadlina Przywoływaczy) – najstarsze i najbardziej szanowane Pole Sprawiedliwości w grze.
            </p>
            <br/>
            <br/>
            <br/>
            <h2>Historia</h2>
            <hr>
            <p>
                Summoner's Rift to najstarsze i najbardziej czczone Pole Sprawiedliwości. Znajduje się w odległym lesie między  Freljordem a Górami Ironspike. Jest jednym z niewielu miejsc w Valoranie, w którym jest największe stężenie magicznej energii, umożliwiając dzięki temu manipulacje i wykonywać różne zadania. Dawniej na tych terenach były toczone starcia pomiędzy dwoma potężnymi frakcjami – Protektoraci (niebieska strona) i Magokraci (czerwona strona). Stosowali potężną magię, która mogła spowodować zniszczeniem całej krainy.
            </p>
            <img class="content_image" src="images/summoners_rift_jungle.jpg" alt="summoners_rift_jungle">
            <h3>Natura</h3>
            W lasach Summoner's Rift żyją zwierzęta, które w wyniku działania potężnej magii zmutowały. Dodatkowo otoczenie w wielu miejscach kompletnie różni się w stosunku do skali zniszczeń. Występują tutaj  gigantyczne żaby,  dwugłowe wilki oraz  wielkie nieloty, które swoją obecnością przyciągają potężnego  smoka, który zamieszkuje pobliskie ruiny. Oprócz zwierząt występują również żywiołaki –  strażnicy,  krzewogrzbiety i  skalniaki, które powstały w wyniku działania magii z okoliczną naturą. Z powodu niestabilnej natury, powstały szczeliny wymiarowe, z których wyszedł najpotężniejszy stwór tego miejsca –  Baron Nashor, wężowe stworzenie, które niegdyś było uważane za wymarłe spowodowało zniszczenie pobliskich terenów, na których obecnie zamieszkuje. Jedynymi dużymi stworzeniami, które nie są agresywne są  kraby – potężne skorupiaki, które unikają jakichkolwiek walk czy zaczepek. Oprócz tych istot występują także zwyczajne stworzenia takie jak ptaki, ślimaki, drobne ssaki czy owady.
            <h2>Rozgrywka</h2>
            <hr>
            <img class="content_image" src="images/summoners_rift_2.jpg" alt="summoners_rift_2">
            <p>
                Summoner's Rift to pierwsze i najbardziej popularne Fields of Justice – stanowi standard dla turniejów League of Legends w rozgrywce 5v5. Gra na mapie dzieli się przeważnie na odrębne fazy – zaczynając się od pojedynków na alei i przechodząc w starcia całych drużyn. Zwycięża się poprzez wdarcie się do bazy wroga i zniszczenie nexusa. Podzielone jest na dwie identyczne połowy i zawiera trzy aleje, prowadzące do bazy wroga. Każdej z nich bronią trzy wieże oraz inhibitor, a samego nexusa – dwie kolejne wieże. Po obu stronach mapy rozciąga się rozległa dżungla, w której znajdują się potężne wzmocnienia, a na centralnej rzece pojawiają się dwa potężne potwory, których pokonanie zapewnia premię dla całej drużyny.
            </p>
            <h3>Tryby rozgrywki</h3>
            <p>
                Wyróżniamy kilka rodzai rozgrywek na tej mapie:
            </p>
            <ol>
                <li>Gra normalna</li>
                <li>Gra rankingowa</li>
                <li>Razem przeciw SI</li>
                <li>Specjalne tryby rozgrywki</li>
                <ul>
                    <li>Jeden za Wszystkich</li>
                    <li>Hexakill</li>
                    <li>Ultra Rapid Fire</li>
                    <li>Niszczące Boty Zagłady</li>
                    <li>Draft Nemezis</li>
                    <li>Awanturnicy Czarnego Rynku</li>
                    <li>Oblężenie Nexusa</li>
                    <li>Łowy Krwawego Księżyca</li>
                    <li>Inwazja</li>
                </ul>
            </ol>
            <h2>Cechy</h2>
            <hr>
            <img class="content_image" src="images/summoners_rift_3.jpg" alt="summoners_rift_3">
            <ul>            
                <li>Długość mapy wynosi 19000 jednostek. (między obeliskami nexusów)</li>
                <li>Trzy linie: Top (Góra); Mid (Środek); Bot (Dół)</li>
                <li>Las zamieszkiwany przez zwierzęta zwane jako Potwory</li>
                <li>Potężne wieże rozmieszczone wzdłuż alei i przy nexusie</li>
                <li>Rzeka łączącą wszystkie ścieżki</li>
                <li>Dwie bazy, w których znajdują się Inhibitory, Nexus – główny rdzeń drużyny oraz fontanna przywoływania – miejsce odradzania i powrotu bohaterów przydzielonych do danych drużyn</li>
            </ul>
            <br/>
            <br/>
            <br/>
            <h2>Sklepikarze</h2>
            <hr>
            <p>
                Do tej pory występowało czterech różnych sklepikarzy. Pierwszy z nich, Doran należy do dość nieznośniej rasy Manbacon, którzy mieli dość niecne zachowania. Następnym był stary męski yordl, który podróżował przez świat za pomocą powozu z dość tajemniczy stworzeniem (przypominało dużego kota lub królika). Następnymi są starsza kobieca yordlka posiadająca potężnego zwierza (niebieska strona) i duży męski yordl z wąsami, który swój sklep założył w potężnym balonie, który się rozbił (czerwona strona).
            </p>
            <img class="sklepikarz_img" src="images/sklepikarz_1.jpg" alt="sklepikarz_1">
            <img class="sklepikarz_img" src="images/sklepikarz_2.jpg" alt="sklepikarz_2">
            <img class="sklepikarz_img" src="images/sklepikarz_3.jpg" alt="sklepikarz_3">
            <img class="sklepikarz_img" src="images/sklepikarz_4.jpg" alt="sklepikarz_4">
		</div>
	</div>
</body>
</html>