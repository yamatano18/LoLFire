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
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
        /* Poprawne połączenie do bazy, wyciągamy dane z tabel champions i skills w celu wygenerowania strony dla przesłanego bohatera z metody GET */
        @$connection->query("SET CHARSET utf8");
		if ($champions_db = @$connection->query(sprintf("SELECT * FROM champions where name='".$_GET['champ']."'")))
		{
            $num_of_champions_db = $champions_db->num_rows;
			if ($num_of_champions_db == 1)
			{
                
                /* Mamy dane dla bohatera w tabeli champions */
                $champions = $champions_db->fetch_assoc();
                if ($skills_db = @$connection->query(sprintf("SELECT * FROM skills where name='".$_GET['champ']."'")))
                {
                    $num_of_skills_db = $skills_db->num_rows;
                    if ($num_of_skills_db == 1)
                    {   
                        /* Mamy dane dla bohatera w tabeli skills, generujemy stronę */
                        $skills = $skills_db->fetch_assoc();
                        echo '
                            <div class="hero_description">
                                <p class="middle">'.$champions['name'].'</p>
                                <img class="champ_image" src="champion_images/'.$champions['image'].'" alt="obraz '.$skills['name'].'">
                                <div class="skill_description">
                                    <div class="skill_content">
                                        <p class="skill_name"><b>'.$skills['passive'].'</b></p>
                                        <div class="clear"></div>
                                        <hr>
                                        <img class="skill_icon" src="champion_icons/skills_icons/'.$skills['passive_icon'].'"  alt="Ikona passyw">
                                        '.$skills['passive_desc'].'
                                    </div>
                                    <div class="skill_content">
                                        <p class="skill_name"><b>'.$skills['q_skill'].'</b></p>
                                        <p class="skill_values_cooldown">Czas odnowienia: '.$skills['q_cooldown'].' sek.</p>
                                        <p class="skill_values_cost">Koszt: '.$skills['q_cost'].' many</p>
                                        <div class="clear"></div>
                                        <hr/>
                                        <img class="skill_icon" src="champion_icons/skills_icons/'.$skills['q_icon'].'"  alt="Ikona Q">
                                        <p>'.$skills['q_desc'].'</p>
                                    </div>
                                    <div class="skill_content">
                                        <p class="skill_name"><b>'.$skills['w_skill'].'</b></p>
                                        <p class="skill_values_cooldown">Czas odnowienia: '.$skills['w_cooldown'].' sek.</p>
                                        <p class="skill_values_cost">Koszt: '.$skills['w_cost'].' many</p>
                                        <div class="clear"></div>
                                        <hr/>
                                        <div class="clear"></div>
                                        <img class="skill_icon" src="champion_icons/skills_icons/'.$skills['w_icon'].'"  alt="Ikona W">
                                        <p class="skill_description">'.$skills['w_desc'].'</p>
                                    </div>
                                    <div class="skill_content">
                                        <p class="skill_name"><b>'.$skills['e_skill'].'</b></p>
                                        <p class="skill_values_cooldown">Czas odnowienia: '.$skills['e_cooldown'].' sek.</p>
                                        <p class="skill_values_cost">Koszt: '.$skills['e_cost'].' many</p>
                                        <div class="clear"></div>
                                        <hr>
                                        <img class="skill_icon" src="champion_icons/skills_icons/'.$skills['e_icon'].'"  alt="Ikona E">
                                        <p class="skill_description">'.$skills['e_desc'].'</p>
                                    </div>
                                    <div class="skill_content">
                                        <p class="skill_name"><b>'.$skills['r_skill'].'</b></p>
                                        <p class="skill_values_cooldown">Czas odnowienia: '.$skills['r_cooldown'].' sek.</p>
                                        <p class="skill_values_cost">Koszt: '.$skills['r_cost'].' many</p>
                                        <div class="clear"></div>
                                        <hr>
                                        <img class="skill_icon" src="champion_icons/skills_icons/'.$skills['r_icon'].'"  alt="Ikona R">
                                        <p class="skill_description">'.$skills['r_desc'].'</p>
                                    </div>   
                                </div>
                        ';
                    }
                    else
                    {
                        /* Brak danych dla bohatera w tabeli skills */
                        echo '
                            Tabela skills nie zawiera danych dla '.$_GET['champ']
                        ;
                    }
                }
                else
                {
                    /* Brak danych dla bohatera w tabeli champions */
                    echo '
                    Opisu dla '.$_GET['champ'].' nie ma w bazie! Poproś właściciela o dodanie.
                    ';
                }
            }
            else
            {   
                /* Poprawne połączenie z bazą, ale nie ma w niej podanego bohatera */
                echo '
                    Bohatera o imieniu '.$_GET['champ'].' nie ma w bazie! Poproś właściciela o dodanie.
                    ';
            }
            /* Zamykam połączenie z bazą */ 
            $connection->close();
        }
    }
    
?>
		</div>
	</div>
</body>
</html>