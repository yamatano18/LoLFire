<?php

    session_start();
	
	if(!isset($_SESSION['zalogowany'])){
		header('Location: login.php');
		exit();
	}

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
</head>
<body>
    <div id="container">
		<div class="menu">
            <div class="logo">
                <a href="index.php"><img src="images/logo2.png" class="logo" alt="lolfire_logo"></a>
			</div>
			<div class="drop_down">
                <a href="hello.php"><button class="drop_button">Konto</button></a>
                <div class="drop_down-content">
					<a href="account_settings.php">Ustawienia konta</a>
                    <a href="add_new_build.php">Dodaj build</a>
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
				<a href="items.php"><button class="drop_button">Przedmioty</button></a>
				<div class="drop_down-content">
					<a href="a31">Znajdź</a>
					<a href="a32">Porównaj</a>
					<a href="a33">*Dodaj</a>
				</div>
			</div>
			<div class="drop_down">
                <a href="maps.php"><button class="drop_button">Mapy</button></a>
				<div class="drop_down-content">
					<a href="sum_rift.php">Summoners Rift</a>
					<a href="tw_treeline.php">Twisted Treeline</a>
					<a href="hol_abbys.php">Hollowing Abbys</a>
				</div>
			</div>
			<div class="drop_down">
                <a href="skinns.php"><button class="drop_button">Skórki</button></a>
				<div class="drop_down-content">
					<a href="a51">a51</a>
					<a href="a52">a52</a>
					<a href="a53">a53</a>
				</div>
			</div>
            <?php
            
                if(isset($_SESSION['username']) && !empty($_SESSION['username']))
                {
                    echo '
                        <div class="logout">
                            <a href="logout.php">
                                <img class="logout_icon" src="images/logout_icon.png">
                            </a>
                        </div>
                        <a class="link" href="hello.php">
                            <div id="user_info">
                                '.$_SESSION['username'].'
                            </div>
                        </a>
                    ';
                    
                }
                
            ?>
            
		</div>
        <div id="news">
            Tablica jak na FB czy coś xD
        </div>
        <div id="login">
        <?php
            if(isset($_SESSION['username']) && !empty($_SESSION['username']))
            {
                echo "Witaj ".$_SESSION['username']."!";
                echo '
                    <div class="div_link">
                        <a class="link" href="logout.php">Wyloguj się!</a>
                    </div>
                ';
            }
            else
            {
                echo "Krytyczny błąd, nie powinno Cię tu być!";
            }
        ?>
		</div>
	</div>
</body>
</html>