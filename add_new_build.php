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
    <meta name="keywords" content="league, of, legends, build, buildy, builds, counter, counters, kontry, lolfire"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
 	<link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/form.css"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="styles/futurico.css" rel="stylesheet">
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
                                <input class="input_champ" id="pick_champ" placeholder="Imię bohatera">
                            
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
</script>
                            </div>
                        ';
                        echo '
                            <div class="box_input">
<table class="skills_set">
    <tr>
        <td>POZIOM</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td>
    </tr>
    <tr>
        <td>Q</td>
		<td><input id="skill_Q_1" class="regular-radio" type="radio" name="level_1"/><label for="skill_Q_1"></label></td>
		<td><input id="skill_Q_2" class="regular-radio" type="radio" name="level_2"/><label for="skill_Q_2"></label></td>
		<td><input id="skill_Q_3" class="regular-radio" type="radio" name="level_3"/><label for="skill_Q_3"></label></td>
		<td><input id="skill_Q_4" class="regular-radio" type="radio" name="level_4"/><label for="skill_Q_4"></label></td>
		<td><input id="skill_Q_5" class="regular-radio" type="radio" name="level_5"/><label for="skill_Q_5"></label></td>
		<td><input id="skill_Q_6" class="regular-radio" type="radio" name="level_6"/><label for="skill_Q_6"></label></td>
		<td><input id="skill_Q_7" class="regular-radio" type="radio" name="level_7"/><label for="skill_Q_7"></label></td>
		<td><input id="skill_Q_8" class="regular-radio" type="radio" name="level_8"/><label for="skill_Q_8"></label></td>
		<td><input id="skill_Q_9" class="regular-radio" type="radio" name="level_9"/><label for="skill_Q_9"></label></td>
		<td><input id="skill_Q_10" class="regular-radio" type="radio" name="level_10"/><label for="skill_Q_10"></label></td>
		<td><input id="skill_Q_11" class="regular-radio" type="radio" name="level_11"/><label for="skill_Q_11"></label></td>
		<td><input id="skill_Q_12" class="regular-radio" type="radio" name="level_12"/><label for="skill_Q_12"></label></td>
		<td><input id="skill_Q_13" class="regular-radio" type="radio" name="level_13"/><label for="skill_Q_13"></label></td>
		<td><input id="skill_Q_14" class="regular-radio" type="radio" name="level_14"/><label for="skill_Q_14"></label></td>
		<td><input id="skill_Q_15" class="regular-radio" type="radio" name="level_15"/><label for="skill_Q_15"></label></td>
		<td><input id="skill_Q_16" class="regular-radio" type="radio" name="level_16"/><label for="skill_Q_16"></label></td>
		<td><input id="skill_Q_17" class="regular-radio" type="radio" name="level_17"/><label for="skill_Q_17"></label></td>
		<td><input id="skill_Q_18" class="regular-radio" type="radio" name="level_18"/><label for="skill_Q_18"></label></td>
    </tr>
    <tr>
        <td>W</td>
		<td><input id="skill_W_1" class="regular-radio" type="radio" name="level_1"/><label for="skill_W_1"></label></td>
		<td><input id="skill_W_2" class="regular-radio" type="radio" name="level_2"/><label for="skill_W_2"></label></td>
		<td><input id="skill_W_3" class="regular-radio" type="radio" name="level_3"/><label for="skill_W_3"></label></td>
		<td><input id="skill_W_4" class="regular-radio" type="radio" name="level_4"/><label for="skill_W_4"></label></td>
		<td><input id="skill_W_5" class="regular-radio" type="radio" name="level_5"/><label for="skill_W_5"></label></td>
		<td><input id="skill_W_6" class="regular-radio" type="radio" name="level_6"/><label for="skill_W_6"></label></td>
		<td><input id="skill_W_7" class="regular-radio" type="radio" name="level_7"/><label for="skill_W_7"></label></td>
		<td><input id="skill_W_8" class="regular-radio" type="radio" name="level_8"/><label for="skill_W_8"></label></td>
		<td><input id="skill_W_9" class="regular-radio" type="radio" name="level_9"/><label for="skill_W_9"></label></td>
		<td><input id="skill_W_10" class="regular-radio" type="radio" name="level_10"/><label for="skill_W_10"></label></td>
		<td><input id="skill_W_11" class="regular-radio" type="radio" name="level_11"/><label for="skill_W_11"></label></td>
		<td><input id="skill_W_12" class="regular-radio" type="radio" name="level_12"/><label for="skill_W_12"></label></td>
		<td><input id="skill_W_13" class="regular-radio" type="radio" name="level_13"/><label for="skill_W_13"></label></td>
		<td><input id="skill_W_14" class="regular-radio" type="radio" name="level_14"/><label for="skill_W_14"></label></td>
		<td><input id="skill_W_15" class="regular-radio" type="radio" name="level_15"/><label for="skill_W_15"></label></td>
		<td><input id="skill_W_16" class="regular-radio" type="radio" name="level_16"/><label for="skill_W_16"></label></td>
		<td><input id="skill_W_17" class="regular-radio" type="radio" name="level_17"/><label for="skill_W_17"></label></td>
		<td><input id="skill_W_18" class="regular-radio" type="radio" name="level_18"/><label for="skill_W_18"></label></td>
    </tr>                                      
    <tr>
        <td>E</td>
		<td><input id="skill_E_1" class="regular-radio" type="radio" name="level_1"/><label for="skill_E_1"></label></td>
		<td><input id="skill_E_2" class="regular-radio" type="radio" name="level_2"/><label for="skill_E_2"></label></td>
		<td><input id="skill_E_3" class="regular-radio" type="radio" name="level_3"/><label for="skill_E_3"></label></td>
		<td><input id="skill_E_4" class="regular-radio" type="radio" name="level_4"/><label for="skill_E_4"></label></td>
		<td><input id="skill_E_5" class="regular-radio" type="radio" name="level_5"/><label for="skill_E_5"></label></td>
		<td><input id="skill_E_6" class="regular-radio" type="radio" name="level_6"/><label for="skill_E_6"></label></td>
		<td><input id="skill_E_7" class="regular-radio" type="radio" name="level_7"/><label for="skill_E_7"></label></td>
		<td><input id="skill_E_8" class="regular-radio" type="radio" name="level_8"/><label for="skill_E_8"></label></td>
		<td><input id="skill_E_9" class="regular-radio" type="radio" name="level_9"/><label for="skill_E_9"></label></td>
		<td><input id="skill_E_10" class="regular-radio" type="radio" name="level_10"/><label for="skill_E_10"></label></td>
		<td><input id="skill_E_11" class="regular-radio" type="radio" name="level_11"/><label for="skill_E_11"></label></td>
		<td><input id="skill_E_12" class="regular-radio" type="radio" name="level_12"/><label for="skill_E_12"></label></td>
		<td><input id="skill_E_13" class="regular-radio" type="radio" name="level_13"/><label for="skill_E_13"></label></td>
		<td><input id="skill_E_14" class="regular-radio" type="radio" name="level_14"/><label for="skill_E_14"></label></td>
		<td><input id="skill_E_15" class="regular-radio" type="radio" name="level_15"/><label for="skill_E_15"></label></td>
		<td><input id="skill_E_16" class="regular-radio" type="radio" name="level_16"/><label for="skill_E_16"></label></td>
		<td><input id="skill_E_17" class="regular-radio" type="radio" name="level_17"/><label for="skill_E_17"></label></td>
		<td><input id="skill_E_18" class="regular-radio" type="radio" name="level_18"/><label for="skill_E_18"></label></td>
    </tr>
    <tr>
        <td>R</td>
		<td><input id="skill_R_1" class="regular-radio" type="radio" name="level_1"/><label for="skill_R_1"></label></td>
		<td><input id="skill_R_2" class="regular-radio" type="radio" name="level_2"/><label for="skill_R_2"></label></td>
		<td><input id="skill_R_3" class="regular-radio" type="radio" name="level_3"/><label for="skill_R_3"></label></td>
		<td><input id="skill_R_4" class="regular-radio" type="radio" name="level_4"/><label for="skill_R_4"></label></td>
		<td><input id="skill_R_5" class="regular-radio" type="radio" name="level_5"/><label for="skill_R_5"></label></td>
		<td><input id="skill_R_6" class="regular-radio" type="radio" name="level_6"/><label for="skill_R_6"></label></td>
		<td><input id="skill_R_7" class="regular-radio" type="radio" name="level_7"/><label for="skill_R_7"></label></td>
		<td><input id="skill_R_8" class="regular-radio" type="radio" name="level_8"/><label for="skill_R_8"></label></td>
		<td><input id="skill_R_9" class="regular-radio" type="radio" name="level_9"/><label for="skill_R_9"></label></td>
		<td><input id="skill_R_10" class="regular-radio" type="radio" name="level_10"/><label for="skill_R_10"></label></td>
		<td><input id="skill_R_11" class="regular-radio" type="radio" name="level_11"/><label for="skill_R_11"></label></td>
		<td><input id="skill_R_12" class="regular-radio" type="radio" name="level_12"/><label for="skill_R_12"></label></td>
		<td><input id="skill_R_13" class="regular-radio" type="radio" name="level_13"/><label for="skill_R_13"></label></td>
		<td><input id="skill_R_14" class="regular-radio" type="radio" name="level_14"/><label for="skill_R_14"></label></td>
		<td><input id="skill_R_15" class="regular-radio" type="radio" name="level_15"/><label for="skill_R_15"></label></td>
		<td><input id="skill_R_16" class="regular-radio" type="radio" name="level_16"/><label for="skill_R_16"></label></td>
		<td><input id="skill_R_17" class="regular-radio" type="radio" name="level_17"/><label for="skill_R_17"></label></td>
		<td><input id="skill_R_18" class="regular-radio" type="radio" name="level_18"/><label for="skill_R_18"></label></td>
    </tr>
</table>
</div>

<script type="text/javascript">
    /* prototyp do oznaczanie umiejętności, których nie można wybrać jako następne 
    var i;
    for (i=1; i<6; i++)
    {
        $("#skill_R_" + i).attr("disabled", "disabled");
    }
    
    $(".regular-radio").click(function() {
            var element = $(this);
            var elementId = element.attr("id");
            var elementIdPrefix = elementId.substr(0, 8);
            
            if (elementId.length == 9)
            {
                var classSuffix = parseInt(elementId.substr(elementId.length-1, 1));
                console.log(elementIdPrefix);
                console.log(classSuffix);
            }
            else if (elementId.length == 10)
            {
                var classSuffix = parseInt(elementId.substr(elementId.length-2, 2));
                console.log(elementIdPrefix);
                console.log(classSuffix);    
            }
            else
                alert("Nieprawidłowa długość nazwy klasy!");
            
            if ($(this.checked).length == 1)
            {
                if (classSuffix-1 > 0)
                {
                    console.log("#" + elementIdPrefix + (classSuffix - 1))
                    $("#" + elementIdPrefix + (classSuffix - 1)).attr("disabled", "disabled");
                    if (classSuffix+1 < 19)
                    {
                        console.log("#" + elementIdPrefix + (classSuffix + 1))
                        $("#" + elementIdPrefix + (classSuffix + 1)).attr("disabled", "disabled");
                    }
                }
            }
            
            if ($(this.checked).length == 0)
                if (classSuffix-1 > 0)
                    $("#" + elementIdPrefix + (classSuffix - 1)).removeAttr("disabled");
                if (classSuffix+1 < 19)
                    $("#" + elementIdPrefix + (classSuffix + 1)).removeAttr("disabled");
        });
        */

</script>
                            <div class="box_input">
                                <span>Wprowadź opis build\'u (w HTML)</span><br>
                                <textarea id="build_description" class="input_box"></textarea>
                                <div id="char_counter">Wpisano 0 z 2000 znaków</div>
                            </div>
                            
<script type="text/javascript">
    var textBox = document.querySelector("#build_description"),
        charCounter = $("#char_counter");
    
    var countCharacters = function () {
        charCounter.text("Wpisano " + textBox.value.length + " z 2000 znaków");
    };
        
    textBox.addEventListener("keydown", countCharacters);
    
    
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
            console.log("Wybrałeś prawidłową liczbę przedmiotów, brawo!");
        }
        
        var countQ = 0;     //max 5
        var countW = 0;     //max 5
        var countE = 0;     //max 5
        var countR = 0;     //max 3
        var i;
        
        for (i=1; i<=18; i++)
        {
            if ($("#skill_Q_" + i + ":checked").length)
                countQ++;
            if ($("#skill_W_" + i + ":checked").length)
                countW++;
            if ($("#skill_E_" + i + ":checked").length)
                countE++;
            if ($("#skill_R_" + i + ":checked").length)
                countR++;
        }
        if ((countQ == 5) && (countW == 5) && (countE == 5) && (countR == 3))
            console.log("Skile są ok!");
        else
            alert("Umiejętności nie mogą zostać rozdane w ten sposób!");
            
        if (textBox.value.length < 2001)
        {
            console.log("Długość opisu OK!");
        }
        else
        {
            alert("Opis jest zbyt długi!");
        }
    }
</script>
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
                    var error_details = toString('.$e.');
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