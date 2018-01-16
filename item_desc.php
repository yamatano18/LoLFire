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
					<a href="heroes.php">Znajdź bohatera</a>
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
<?php
    require_once "connect.php";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno != 0)   
	{
        /* Błąd podczas łączenia z bazą danych */
        throw new Exception(mysqli_connect_errno());
	}
	else
	{
        /* Poprawne połączenie do bazy, wyciągamy dane z tabel champions i skills w celu wygenerowania strony dla przesłanego bohatera z metody GET */
        @$connection->query("SET CHARSET utf8");
		if ($items_db = @$connection->query(sprintf("SELECT * FROM items where id='".$_GET['item']."'")))
		{
            $num_of_items_db = $items_db->num_rows;
			if ($num_of_items_db == 1)
			{
                /* Mamy dane dla przedmiotu w tabeli items, generujemy stronę */
                $items = $items_db->fetch_assoc();
                echo '
                    <div class="item_description">
                        <img class="item_icon_big" src="items_icons/'.$items['icon'].'" alt="Ikona">
                        <div class="left">
                            <div class="item_name">'.$items['name'].'</div>
                            <div class="item_cost">Koszt: '.$items['cost'].' złota</div>
                        </div>
                        <div class="clear"></div>
                        <div class="item_content">
                            <div class="clear"></div>
                            <hr>
                            <div class="item_details">Statystyki</div>
                            <div>'.$items['statistics'].'</div>
                            <hr>
                            <div class="item_details">Bierne</div>
                            <div>'.$items['details'].'</div>
                        </div>
                    </div>
                ';
            }
            else
            {
                /* Brak danych dla przedmiotu w tabeli items */
                echo '
                    Tabela items nie zawiera danych dla '.$_GET['item']
                ;
            }
        }
        else
        {   
        /* Poprawne połączenie z bazą, ale nie ma w niej podanego przedmiotu */
        echo '
            Przedmiotu o nazwie '.$_GET['item'].' nie ma w bazie! Poproś właściciela o dodanie.
            ';
        }
    }
    /* Zamykam połączenie z bazą */ 
    $connection->close();
    
?>
		</div>
	</div>
</body>
</html>