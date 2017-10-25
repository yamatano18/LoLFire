    
    session_start();

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
        header('Location: account.php');
        exit();
    }
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>LoLFire</title>
    <meta name="description" content="Grasz w League of Legends i szukasz nowych buildów lub innej pomocy? Ta strona jest właśnie dla Ciebie!"/>
    <meta name="keywords" content="league, of, legends, build, buildy, builds, counter, kontry, character, hero, bohaterowie, description, opis"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        jQuery(document).ready(function($){
          slide = function(obj) {
            $(obj).stop().slideToggle();
            };
        });
    </script>
</head>
<body>
    <div id="container">
        <div class="menu">
            <div class="drop_down">
                <button class="drop_button">1</button>
                <div class="drop_down-content">
                    <a href="a11">a11</a>
                    <a href="a12">a12</a>
                    <a href="a13">a13</a>
                </div>
            </div>
            <div class="drop_down">
                <button class="drop_button">2</button>
                <div class="drop_down-content">
                    <a href="a21">a21</a>
                    <a href="a22">a22</a>
                    <a href="a23">a23</a>
                </div>
            </div>
            <div class="drop_down">
                <button class="drop_button">3</button>
                <div class="drop_down-content">
                    <a href="a31">a31</a>
                    <a href="a32">a32</a>
                    <a href="a33">a33</a>
                </div>
            </div>
            <div class="drop_down">
                <button class="drop_button">4</button>
                <div class="drop_down-content">
                    <a href="a41">a41</a>
                    <a href="a42">a42</a>
                    <a href="a43">a43</a>
                </div>
            </div>
            <div class="drop_down">
                <button class="drop_button">5</button>
                <div class="drop_down-content">
                    <a href="a51">a51</a>
                    <a href="a52">a52</a>
                    <a href="a53">a53</a>
                </div>
            </div>
        </div>
        <div id="login">
            <form action="login.php" method="post">
                Login: <br/>
                <input type="text" name="login"> <br/>
                Hasło: <br/>
                <input type="password" name="haslo"> <br/>
                <br/>
                <input type="submit" value="Zaloguj się"/>
            </form>
            </div>

    <?php
        if (isset($_SESSION['error']))
            echo $_SESSION['error'];
    ?>
       
    </div>
</body>
</html>