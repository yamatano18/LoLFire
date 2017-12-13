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
            <h1>Howling Abyss</h1>
            <hr>
            <img class="content_image" src="images/howling_abyss_1.png" alt="howling_abyss_1">
            <p>
                Howling Abyss (Wyjąca Otchłań) – jedno z Pól Sprawiedliwości, na którym rozgrywany jest tryb ARAM. Zastąpił Arenę Treningową w grach niestandardowych oraz w samouczku.
            </p>
            <br/>
            <br/>
            <br/>
            <h2>Historia</h2>
            <hr>
            <img class="content_image" src="images/howling_abyss_2.jpg" alt="howling_abyss_2">
            <p>
                To coś więcej niż tylko most. Może kiedyś był to tylko twór z kamienia, ale teraz spoczywa na nim ciężar całego Freljordu. Wiele lat temu, doszło tu do długiej i brutalnej bitwy, która zadecydowała o losach tej krainy. Rozejrzyj się i posłuchaj, ten hałas to nie tylko wiatr – to krzyki pokonanych zrzuconych w otchłań. Nikt już nie pamięta, kto i po co zbudował ten most. Nikt już nie pamięta wojny, która zniszczyła to miejsce. Nikt poza mną. Ja tu byłem! Ja widziałem tę bitwę! Ja tu umarłem i nigdy nie opuściłem tego miejsca! Miałem tu pozostać i zadąć w róg, gdyby powrócili nasi przeciwnicy. Teraz, teraz wycie staje się głośniejsze i wyczuwam coś złego z czeluści otchłani. Sięgam po róg. W tym miejscu wkrótce znowu dojdzie do bitwy. Bitwy, która zadecyduje o losach Freljordu. Jeżeli Freljord upadnie, wkrótce podąży za nim reszta świata. Tak, to coś więcej niż tylko most...
            </p>
            <h2>Rozgrywka</h2>
            <hr>
            <p>
                Ten tryb społecznościowy szybko przekształcił się w jedną z najpopularniejszych form gry w League of Legends. Na Howling Abyss (Murder Bridge, czyli Most Śmierci, jak się go pieszczotliwie nazywa) dwie drużyny po pięciu bohaterów walczą ze sobą na jednej alei bez neutralnego terytorium. Rozgrywkę zaczyna się na 3. poziomie ze sporym zapasem złota, a gra szybko przeistacza się w bitwę, składającą się z dużych walk drużynowych, szybkich zabójstw i cudownych ucieczek.
            </p>
            <h3>Walka o Abyss</h3>
            <img class="content_image" src="images/howling_abyss_3.jpg" alt="howling_abyss_3">
            <p>
                Jedyne pole bitwy z jedną aleją w League of Legends, Howling Abyss, posiada dwie bazy umieszczone na krańcach mostu. Broniony jest on przez dwie wieże i inhibitor, a nexusy – przez kolejną parę wież. Ponieważ brak tu ziemi niczyjej, która rozpraszałaby graczy, na Howling Abyss rozgrywają się najczęstsze i najbardziej intensywne walki drużynowe.
            </p>
            <p>
            <h3>Tryby rozgrywki</h3>
            <p>
                Wyróżniamy kilka rodzai rozgrywek na tej mapie:
            </p>
            <ol>
                <li>Samouczek</li>
                <li>Gra normalna</li>
                <li>Jeden za Wszystkich - Lustrzane Odbici</li>
                <li>Legenda o Królu Poro</li>
            </ol>
            <h2>Cechy</h2>
            <hr>
            <ul>
                <li>Posiada jedną aleję.</li>                    
                <li>Stwory posiadają pancerz i odporność na magię.</li> 
                <li>Bohaterowie na początku posiadają 3. poziom i 1375 złota.</li> 
                <li>Powrót jest wyłączony, można używać w celu ukazania animacji.</li> 
                <li>Przy alei są dostępne 4 relikty zdrowia (pojawiają się o 3:10 czasu rozgrywki i odradzają się co 40 sekund).</li> 
                <li>Można tylko raz kupić przedmioty w sklepie.</li> 
                <li>Aby ponownie coś zakupić, trzeba zginąć.</li> 
                <li>Główny cel – zniszczenie wrogiego nexusa.</li>
            </ul>
            <h3>Efekty globalne</h3>
            <ul>
                <li>Zmniejsza wszystkie efekty lecznicze o 50%
                <li>Efekt ten nie dotyczy regeneracji zdrowia, kradzieży życia i wampiryzmu zaklęć
                <li>Zwiększa regeneracje many (0.15% maksymalnej many co sekundę)
                <li>Zapewnia biernie zdobywane doświadczenie
            </ul>
            <h2>Sklepikarze</h2>
            <hr>
            <p>
                Wiking Gregor oraz pustelnik Lyte wymuszają do „ograniczonych zakupów”, zapobiegając dzięki temu kupowaniu przedmiotów przez bohaterów po opuszczeniu fontanny, dopóki nie zginie na polu walki. Punkty, kiedy sklepy są nieaktywne, mają specjalne animacje – Gregor chowa się do swojego ciała, a Lyte po pożegnaniu się udaje się do swojego namiotu. Dodatkowo generują kolekcję cytatów, opowiadając przy tym historię, swoje spostrzeżenia, zauważają posiadaną ilość złota, zakupy bohaterów oraz wymawiają specjalne kwestie dla bohaterów z  Freljordu,  Piltover, Yordlów oraz dla niektórych bohaterów. Poniżej znajdują się wszystkie kwestie wypowiadane przez tę dwójkę.
            </p>
            <img class="sklepikarz_img" src="images/sklepikarz_5.png" alt="sklepikarz_5">
            <img class="sklepikarz_img" src="images/sklepikarz_6.png" alt="sklepikarz_6">
		</div>
		
	</div>
</body>
</html>