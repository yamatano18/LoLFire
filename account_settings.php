<?php

    session_start();
	
	if(!isset($_SESSION['zalogowany'])){
		header('Location: login.php');
		exit();
	}
    else
    {
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        $login = $_SESSION['username'];
        
        try
        {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno != 0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                /* Poprawne połączenie do bazy, wyciągamy dane z tabeli users dla konkretnego użytkownika */
                @$connection->query("SET CHARSET utf8");
                if ($users_db_login = $connection->query(sprintf("SELECT * FROM users WHERE login='$login'")))
                {
                    $number_of_users = $users_db_login->num_rows;
                    if ($number_of_users == 1)
                    {
                        $_SESSION['users'] = $users_db_login->fetch_assoc();
                    }
                    else if ($number_of_users < 1)
                    {
                        echo 'Krytyczny błąd: brak użytkownika o login = "'.$login.'" !!!';
                    }
                    else
                    {
                        echo 'Krytyczny błąd: więcej niż jeden użytkownik o login = "'.$login.'" !!!';
                    }
                }
            }
        }
        catch(Exception $e)
        {
            echo '
                <script language="javascript">;
                    var error_details = "'.$e.'";
                    console.log("Błąd serwera, przepraszamy za niedogodności. Proszę o rejestrację w innym terminie!");
                    console.log(error_details);
                </script>
            ';
        }
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
            <a class="link" href="hello.php">
                <div id="user_info">'.$_SESSION['username'].'</div>
            </a>
        ';
    }
            
?>
		</div>
        <div id="settings">
            <div class="heading">Ustawienia konta</div>
<?php
    if(isset($_SESSION['username']) && !empty($_SESSION['username']))
    {
        if (intval($_SESSION['users']['is_special_user']) == 1)
        {
            $acc_type = "premium";
        }
        else
        {
            $acc_type = "podstawowe";
        }
        echo '
            <div class="sett_left">
                <div class="acc_set_1">Login: <div class="change_button">'.$_SESSION['users']['login'].'</div></div>
                <div class="acc_set_2">E-mail: <div class="change_button">'.$_SESSION['users']['email'].'</div></div>
                <div class="acc_set_1">Konto: <div class="change_button">'.$acc_type.'</div></div>
            ';
        if ($acc_type == "podstawowe")
        {
            echo '
                    <div class="div_link">VIP - (mail_to)</div>
                </div>
            ';
        }
        echo '
            <div class="sett_right">
                tu jakaś miniaturka i możliwość zmiany
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