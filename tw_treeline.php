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
            <h1>Twisted Treeline</h1>
            <hr>
            <img class="content_image" src="images/twisted_treeline_1.png" alt="twisted_treeline_1">
            <p>
                Twisted Treeline – jedno z Pól Sprawiedliwości z dwiema alejami, wydaną na krótko przed oficjalną premierą gry (10 październik 2009 – wersja beta; 30 marzec 2010 – oficjalnie).
            </p>
            <br/>
            <br/>
            <br/>
            <h2>Historia</h2>
            <hr>
            <img class="content_image" src="images/twisted_treeline_2.jpg" alt="twisted_treeline_2">
            <p>
                Miejsce znane jako Twisted Treeline leży na tajemniczych Shadow Isles. Wyspy te są zawsze spowite grubą, nieprzeniknioną mgłą, uniemożliwiającą dojrzenie wysp z zewnątrz. Uważa się, że Shadow Isles są domem dla niezliczonych nieumarłych, lecz nikt nie ma ochoty wybrać się tam i osobiście to sprawdzić.
            </p>
            <br/>
            <br/>
            <br/>
            <br/>
            <h2>Rozgrywka</h2>
            <hr>
            <img class="content_image" src="images/twisted_treeline_3.jpg" alt="twisted_treeline_3">
            <p>
                Twisted Treeline to mapa z dwiema alejami, a głównym zadaniem trzyosobowych drużyn jest zniszczenie Nexusa przeciwnika. Pomiędzy alejami znajduje się dżungla, w której znajduje się kilka obozów neutralnych potworów oraz dwa ołtarze – wschodni i zachodni, które zapewniają dodatkowe korzyści oraz opowiadają historię tego miejsca. Nad górną aleją, w połowie drogi pomiędzy bazami, znajduje się legowisko Vilemawa, będącego odpowiednikiem Smoka i Barona Nashora na Summoner's Rift. Jego pokonanie zapewnia drużynie Nimb Miażdżącego Gniewu, zwiększający pewne statystyki i dający wzmocnienie dla pobliskich stworów podobnie jak Namiestnik Barona tylko dodatkowo na początku straszą wrogie stwory.
            </p>
            <p>
            <h3>Tryby rozgrywki</h3>
            <p>
                Wyróżniamy kilka rodzai rozgrywek na tej mapie:
            </p>
            <ol>
                <li>Gra normalna</li>
                <li>Gra rankingowa</li>
                <li>Razem przeciw SI</li>
                <li>Hexakill</li>
            </ol>
            <h2>Cechy</h2>
            <hr>
            <p>
                <ul>
                    <li>Dwie linie oraz dżungla zamieszkała przez neutralne potwory o różnym stopniu wytrzymałości.</li>
                    <li>Potężne wieże broniące kluczowych obszarów na mapie (łącznie: 14).</li>
                    <li>Dwie bazy po przeciwległych stronach mapy z Nexusem.</li>
                    <li>Relikt zdrowia w środkowej części mapy, który daje zdrowie oraz premię do prędkości ruchu.</li>
                    <li>Ołtarze po dwóch stronach dżungli.</li>
                    <li>Specjalne przedmioty do szybkich rozgrywek oraz 850 szt. złota na start.</li>
                </ul>
            <h2>Strategia</h2>
            <hr>
                <img class="content_image" src="images/twisted_treeline_jungle.jpg" alt="twisted_treeline_jungle">
                <ul>
                    <li>Współpracuj z członkami drużyny aby zyskać szanse zabicia przeciwników.</li>
                    <li>Podstawową strategią jest dwóch graczy na dolnej linii i jeden gracz na górnej, co pozwala na jednego gracza silniejszego od dwóch pozostałych i mającego dużą przewagę podczas gankowania przeciwników na dolnej linii. Laning nie powinien trwać zbyt długo ponieważ w tym przypadku masz wyższy poziom od przeciwników i możesz zyskiwać złoto z gankowania wrogów na dolnej alei.</li>
                    <li>Bardziej ambitną strategią jest posiadanie dwóch graczy na górnej alei i jednego na dolnej. Taka konfiguracja może lepiej kontrolować  Vilemawa (i całą dżunglę). Kiedy dwóch bohaterów jest na jednej linii tylko jeden z nich powinien farmić. Kombinacja wyfarmiony bohater+ wspierający jest bardziej przydatna w walkach drużynowych niż dwóch bohaterów bez złota.</li>
                    <li>Jeszcze inną konfiguracją są dwie solowe linie z dżunglerem. Zmiany w dżungli na Twisted Treeline sprawiły że potwory są trudniejsze i nie ma obecnie zbyt wielu opłacalnych dżunglerów.</li>
                    <li>Kiedy bohaterowie, którzy są skuteczni w dżungli grają na górnej alei, często zabijają neutralne potwory aby zyskać przewagę w poziomie nad przeciwnikami oraz wzmocnienia.</li>
                    <li>Obszar dżungli na Twisted Treeline jest nie tylko dobry do atakowania przeciwników z zaskoczenia, ale również do przechytrzania ich uciekając.</li>
                </ul>
		</div>
	</div>
</body>
</html>