<?php

	include_once "./conn.php";
	
    session_start();
	$polaczenie = new mysqli( $db_host, $db_user, $db_pass, $db_name);
	
    if ( !(isset($_SESSION['zalogowany'])) || !($_SESSION['zalogowany']==true)) {
        exit("niezalogowany");
      }
	  	echo "<h3>Witaj ".$_SESSION['user']."</h3>";

?>
<p>
<a href="./logout.php">[Wyloguj]</a></p>