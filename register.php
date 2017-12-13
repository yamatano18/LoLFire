<?php

	session_start();

    if (isset($_POST['login']) && isset($_POST['haslo1']) && isset($_POST['haslo2']) && isset($_POST['email']))
    {
        // Czy udana walidacja? Zakładamy, że tak!
        $wszystko_ok = true;
        
        // Sprawdzamy poprawność wartości
        $login = $_POST['login'];
        if (strlen($login) < 6 || strlen($login) > 20)
        {
            $wszystko_ok = false;
            $_SESSION['e_login'] = "Nick musi posiadać od 6 do 20 znaków";
        }
        if (ctype_alnum($login) == false)
        {
            $wszystko_ok = false;
            $_SESSION['e_login'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
        }
        
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];
        if (strlen($haslo1) < 8 || strlen($haslo1) > 24)
        {
            $wszystko_ok = false;
            $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 24 znaków";
        }
        if ($haslo1 != $haslo2)
        {
            $wszystko_ok = false;
            $_SESSION['e_haslo'] = "Podane hasła różnią się!";
        }
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        
        $email = $_POST['email'];
        if (strlen($email) > 50)
        {
            $wszystko_ok = false;
            $_SESSION['e_email'] = "Adres e-mail nie może być dłuższy niż 50 znaków!";
        }
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email))
        {
            $wszystko_ok = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }
        
        // Czy zaakceptowano regulamin?
        if (!isset($_POST['regulamin']))
        {
            $wszystko_ok = false;
            $_SESSION['e_regulamin'] = "Musisz zaakceptować regulamin!";
        }
        
        // BOT or not?
        $sekret = "6LfELjgUAAAAAMtMte8aMhqY6je6fL06rhPNgXww";
        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
        $odpowiedz = json_decode($sprawdz);
        if ($odpowiedz->success == false)
        {
            $wszystko_ok = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
        }
        
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        
        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno != 0)   
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                // Czy login jest już zarezerwowany?
                $rezultat = $connection->query("SELECT user_id FROM users WHERE login = '$login'");
                if (!$rezultat) throw new Exception($connection->error);
                
                $ile_takich_loginow = $rezultat->num_rows;
                if ($ile_takich_loginow > 0)
                {
                    $wszystko_ok = false;
                    $_SESSION['e_login'] = "Konto o podanym loginie już istnieje!";
                }
                
                // Czy email już istnieje?
                $rezultat = $connection->query("SELECT user_id FROM users WHERE email = '$email'");
                if (!$rezultat) throw new Exception($connection->error);
                
                $ile_takich_maili = $rezultat->num_rows;
                if ($ile_takich_maili > 0)
                {
                    $wszystko_ok = false;
                    $_SESSION['e_email'] = "Do podanego e-maila przypisane jest już konto!";
                }

                // Wartości zostały zwalidowane
                if ($wszystko_ok == true)
                {
                    // Wpisujemy dane do bazy
                    if ($connection->query("INSERT INTO users VALUES (NULL, '$login', '$haslo_hash', '$email', 0)"))
                    {
                        $_SESSION['success_reg'] = true;
                        header('Location: welcome.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                }
                
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color = red">Błąd serwera, przepraszamy za niedogodności, proszę o rejestrację w innym terminie</span>';
            echo 'inf developerska: '.$e;
        }
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>LoLFire - rejestracja</title>
    <meta name="description" content="Grasz w League of Legends i szukasz nowych buildów lub innej pomocy? Ta strona jest właśnie dla Ciebie!"/>
    <meta name="keywords" content="league, of, legends, build, buildy, builds, counter"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
 	<link rel="stylesheet" type="text/css" href="styles/main.css"/>
 	<link rel="stylesheet" type="text/css" href="styles/style_register.css"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
		<div id="login">
			<form method="post">
				Login: <br/>
				<input type="text" name="login"/><br/>
                <?php
                    if (isset($_SESSION['e_login']))
                    {
                        echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                        unset($_SESSION['e_login']);
                    }
                ?>
                Hasło: <br/>
				<input type="password" name="haslo1"/><br/>
                <?php
                    if (isset($_SESSION['e_haslo']))
                    {
                        echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                        unset($_SESSION['e_haslo']);
                    }
                ?>
                Powtórz hasło: <br/>
				<input type="password" name="haslo2"/><br/>
                E-mail: <br/>
				<input type="text" name="email"/><br/>
                <?php
                    if (isset($_SESSION['e_email']))
                    {
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    }
                ?>
                <label>
                   <input type="checkbox" name="regulamin"/>Akceptuję regulamin
                </label>
                <?php
                    if (isset($_SESSION['e_regulamin']))
                    {
                        echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                        unset($_SESSION['e_regulamin']);
                    }
                ?>
				<div class="cen">
					<div class="g-recaptcha" data-sitekey="6LfELjgUAAAAAJa6yZkrFN_8oX5U977UPzuyQE-a"></div>
				</div>
                <?php
                    if (isset($_SESSION['e_bot']))
                    {
                        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                        unset($_SESSION['e_bot']);
                    }
                ?>
				<input type="submit" value="Zarejestruj się"/>
            </form>
		</div>
	</div>
</body>
</html>