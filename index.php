<?php

	session_start();

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

</head>
<body>
<div id="header">
   <img src="logo.png" alt="logo" id="logocs">  
</div>

<div id="php1" style="text-align: center; clear: both; width: 100%; font-family: 'Roboto', sans-serif;">
<?php

    include_once "./conn.php";
    // include "./conn.php";


    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) {
        exit("<h1>zalogowany <br> <a href='./zalogowany.php'> Panel </a></h1>");
    }

    if(isset($_POST) && isset($_POST["login"]) && isset($_POST["haslo"])){
        $polaczenie = new mysqli( $db_host, $db_user, $db_pass, $db_name );

        if ($polaczenie->connect_errno != 0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }
        else
        {
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];

            if ($rezultat = @$polaczenie->query( sprintf("SELECT * FROM users WHERE user='%s' AND pass='%s'", $login, $haslo ) ) )
            {
                $ilu_userow = $rezultat->num_rows;
                if($ilu_userow>0)
                {

                  $wiersz = $rezultat->fetch_assoc();
                  $_SESSION['user'] = $wiersz['user'];
                  $_SESSION['pesel'] = $wiersz['pesel'];
                    $_SESSION['zalogowany'] = true;
                    echo "<h1>Poprawne dane logowania<br> <a href='./zalogowany.php'> Panel </a></h1>";
                } else {
                    echo "<h1>Niepoprawne dane logowania</h1>";
                }
            }
        }
    }
?>
</div>

  

<div id="container">
<div class="topnav" id="myTopnav">
  <label class="icon" for="burger">
    <i class="fa fa-bars"></i>
  </label>
  <input type="checkbox" name="burger" id="burger">
  <ul>
    <li> <a href="#home" class="active">Start</a></li>
    <li> <a href="#news">Informacje</a></li>
    <li> <a href="#contact">Artyku??y</a></li>
    <li> <a href="#about">Kontakt</a></li>
    <li> <a class="open-button" onclick="openForm()">Logowanie</a></li>
    <li>
      <a href="rejestracja.php" >Zarejestruj</a>
    </li>
  </ul>
</div>

  <div id="lewy">
      <h3> 
        Test Corsair iCUE LS100 i iCUE LT100 - paski i wie??e LED dla graczy | PurePC.pl
      </h3>
      <div class="tekst">
        Wsz??dobylskie ju?? niemal LEDy mo??na albo kocha??, albo nienawidzi??. Pewnie nara???? si?? wielu z Was pisz??c, ??e do mnie ten rodzaj "wizualnego tuningu" po prostu przemawia. Nie musz?? mie?? pod??wietlenia we wszystkim co si?? da, jednak doceniam gustowny komputerowy zestaw, pracuj??cy w oparciu o jeden, zsynchronizowany ekosystem pokroju Corsair iCUE. Podejmuj??c si?? zrecenzowania nowych urz??dze?? pracuj??cych we wspomnianym ??rodowisku (mowa o paskach iCUE LS100 oraz wie??ach iCUE LT100), mia??am pewne w??tpliwo??ci. Odnosz?? bowiem wra??enie, ??e czytelnicy naszego serwisu stoj?? raczej po drugiej stronie barykady i s?? niech??tni wspomnianym iluminacjom. A mimo to na PurePC mia??by pojawi?? si?? materia?? recenzuj??cy zupe??nie opcjonalne (??eby nie napisa?? - zb??dne) elementy wyposa??enia komputera, bazuj??ce przede wszystkim (wy????cznie?) na LEDach? C????, mimo wszystko, zachowuj??c ducha tolerancji dla wszelkich gust??w (bo o tych si?? przecie?? nie dyskutuje), zmierzmy si?? z recenzj?? Corsair iCUE LS100 i iCUE LT100!
      </div>
    </div>
    <div id="prawy" >
    <a href="#img1">
    <img src="komputer.png" alt="komputer" width="600" id="komputer">
    </a>
    
    <a href="#" class="lightbox" id="img1">
    <span style="background-image: url('komputer.png')"></span>
    </a>
    </div>
  </div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


<div>
 
<div class="form-popup" id="myForm">
  <form action="index.php" method="post" class="form-container">
    <h1>Zaloguj si??</h1>
    <input type="text" placeholder="Nick" name="login" required>
    <input type="password" placeholder="Has??o" name="haslo" required>
    <button type="submit" class="btn">Zaloguj</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Zamknij</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</div>

</body>
</html>