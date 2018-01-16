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
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
        @$connection->query("SET CHARSET utf8");
        if ($result = @$connection->query(sprintf("SELECT * FROM items order by name")))
		{
			$num_of_items = $result->num_rows;
			if ($num_of_items > 0)
			{
                for ($i=1; $i <= $num_of_items; $i++)
                {
                $row[$i] = $result->fetch_assoc();
                echo '
                    <div class="item_button">
                        <div class="item_icon">
                            <a href="item_desc.php?item='.($row[$i]['name']).'">
                                <img src="items_icons/'.$row[$i]['icon'].'" alt="Ikona '.$row[$i]['name'].'">
                            </a>
                            <a class="item_name_link" href="item_desc.php?item='.($row[$i]['id']).'">'.$row[$i]['name'].'</a>
                        </div>
                    </div>
                    ';
                }
            }
            $connection->close();
        }
    }
?>
		</div>
	</div>
</body>
</html>