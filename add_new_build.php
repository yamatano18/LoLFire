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
    <link rel="stylesheet" type="text/css" href="styles/form.css"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        <div id="build_box">
<?php
                
            require_once "connect.php";
            mysqli_report(MYSQLI_REPORT_STRICT);
            
            try
            {
                $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                if ($connection->connect_errno != 0)
                {
                    throw new Exception(mysqli_connect_errno());
                }
                else
                {
                    $champions_db = $connection->query("SELECT DISTINCT name FROM champions ORDER BY name");
                    $items_db = $connection->query("SELECT * FROM items ORDER BY name");
                    if (!$champions_db || !$items_db) 
                    {
                        throw new Exception($connection->error);
                    }
                    else
                    {
                        $number_of_champions = $champions_db->num_rows;
                        $number_of_items = $items_db->num_rows;
                        $champ_names_to_array = "";
                        for ($i=0; $i<=$number_of_champions-1; $i++)
                        {
                            $champions_names[$i] = $champions_db->fetch_assoc();
                            $champ_names_to_array = $champ_names_to_array.'"'.$champions_names[$i]['name'].'"';
                            if ($i != $number_of_champions-1)
                            {
                                $champ_names_to_array = $champ_names_to_array.',';
                            }
                        }
                        echo '
                            <div class="box_input">
                                <span>Wybierz bohatera:</span><br>
                                <input class="input_champ" id="pick_champ">
                            
<script type="text/javascript">
    
</script>
                            </div>
                            <div class="box_input">
                                <span>Wybierz 6 przedmiotów do Twojego buildu:</span><br>
                        ';
                        for ($j=1; $j<=$number_of_items-1; $j++)
                        {
                            $item[$j] = $items_db->fetch_assoc();
                            echo '
                                <div class="item_icon_small" item_id="'.$item[$j]['id'].'">
                                    <img src="items_icons/'.$item[$j]['icon'].'" alt="Ikona '.$item[$j]['name'].'">
                                </div>
                            ';
                        }
                        
                        echo '
<script type="text/javascript">
    /* ustawianie podpowiedzi dla pola id="pick_champ" */
    var availableTags = ['.$champ_names_to_array.']; 
    $(function() {
        $("#pick_champ").autocomplete({source: availableTags});
    });

    /* ustawianie wybranych przedmiotów onclick */
    var selectedItems = 0;
    var itemsIDs = [];
    console.log("dziala");
    
    $(".item_icon_small").each(function() {
        $(this).attr("isActive", false);
        console.log("ustawiono false");
    });
    $(".item_icon_small").click(function() {
            /* wybranie 6th elementu jest możliwe, ale nie 7th */
            if ($(this).attr("isActive") == "false" && selectedItems < 6)
            {   
                /* aktywujemy element */
                $(this).removeClass("item_icon_small").addClass("item_icon_small_active");
                $(this).attr("isActive", true);
                selectedItems++;
                itemsIDs[selectedItems - 1] = $(this).attr("item_id");                
            }
            else if ($(this).attr("isActive") == "true")
            {
                /* dezaktywujemy element */
                $(this).removeClass("item_icon_small_active").addClass("item_icon_small");
                $(this).attr("isActive", false);
                
                console.log("Usuwam item o id = " + $(this).attr("item_id"));
                itemsIDs = itemsIDs.filter(value => value !== $(this).attr("item_id"));
                selectedItems--;
            }
            else
            {
                /* aktywujemy element, ale już wybrano 6 */
                alert("Wybrałeś już 6 przedmiotów!");
            }
        }
    );
    
    function weryfikuj() {
        var champName = document.getElementById("pick_champ").value;
        if (champName.length <= 0)
        {
            alert("Pole z wyborem bohatera nie może być puste!");
        }
        else if (availableTags.indexOf(champName) < 0)
        {
            alert("Bohater \'" + champName + "\' nie jest dostępny!");
        }
        else if (selectedItems != 6)
        {
            alert("Wybrałeś " + selectedItems + " przedmiotów, a miało być 6!");
        }
        else
        {
            alert("Wybrałeś prawidłową liczbę przedmiotów, brawo!");
        }
    }
</script>
                            </div>
                            <button class="click_div" onclick="weryfikuj()">Weryfikacja</button>
                        ';
                    }
                }
                $connection->close();
            }
            catch (Exception $e)
            {
                echo '
                <script language="javascript">;
                    var error_details = "'.$e.'";
                    console.log("Błąd serwera, przepraszamy za niedogodności.");
                    console.log(error_details);
                </script>
            ';
            }
?>
		</div>
	</div>
</body>
</html>