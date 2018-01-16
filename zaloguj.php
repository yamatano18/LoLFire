<?php

    session_start();

	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: login.php');
		exit();
	}		
	
    require_once "connect.php";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno != 0)   
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		if ($result = @$connection->query(sprintf("SELECT * FROM users WHERE login = '%s'", mysqli_real_escape_string($connection, $login))))
		{
			$num_of_users = $result->num_rows;
			if ($num_of_users > 0)
			{
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password']))
                {
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['login'];

                    unset($_SESSION['blad']);
                    $result->free_result();
                    header('Location: hello.php');
                }
                else
                {
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                    header('Location: login.php');
                }
            }
            else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: login.php');
			}
			
		}
        $connection->close();
    }
	
?>