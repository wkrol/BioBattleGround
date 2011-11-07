﻿<?php
session_start();
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	require_once 'strona.php';

	//require("db2.php");
	class Logowanie extends Strona {
	public function Wyswietl()
  {
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n";
	$this->WyswietlKodowanie();
    $this->WyswietlTytul();
    $this->WyswietlSlowaKluczowe();
    $this->WyswietlStyle();
	$this->WyswietlSkrypty();
    echo "</head>\n<body>\n";
    $this->WyswietlNaglowek();
    $this->WyswietlMenu($this->przyciski, $this->nazwadzialu);
	$this->WyswietlZawartosc();
    $this->WyswietlStopke();
    echo "</body>\n</html>\n";
  }
  


	public function FunkcjaLogowanie() {
		$nazwa_uz = $_POST['nazwa_uz'];
		$haslo = $_POST['haslo'];
		if ($nazwa_uz && $haslo) {
				//Uzycie funckji logowania z klasy UserPeer, ktora zwraca true lub false.
				$user_id=UserPeer::login($nazwa_uz, $haslo);
    			if($user_id!=false){
					$_SESSION['zalogowany'] = $nazwa_uz;
					$_SESSION["user_id"] = $user_id;
					header('Location:index.php');
    			} else {
    			echo 'Zalogowanie niemożliwe. <a href="index.php">Powróć do strony głównej i popraw dane.</a>';
    			}
						
		} else {
			echo '<center><h1>Zalogowanie niemożliwe. Nie uzupełniono wszystkich pól. Popraw dane.</h1></center>';
		}
	}

	public function WyswietlZawartosc() {
	echo "<div id=\"logowanie\">";
		if (isset($_SESSION['zalogowany'])) {

			if(isset($_GET["wyloguj"])) {
			if($_GET["wyloguj"]=="tak"){$_SESSION["zalogowany"]=NULL; echo 'Wylogowano! <a href="index.php">Idź do strony głównej</a>';}
			}
			else{
			echo  '<br/>Zalogowano jako '.$_SESSION['zalogowany'].'. <a href="?wyloguj=tak">Wyloguj</a><br />';
			}
		}else{
		echo '
				
				<form method="post" action="logowanie.php?akcja=loguj">
<div>Nazwa użytkownika: <input type="text" name="nazwa_uz"/> | Hasło: <input type="password" name="haslo"/><br/><br/><input type="submit" class="submit" value="Logowanie"/></div> 
</form><br/>
				
			';
		}
	echo "</div>";
	}
	}
	$strona = new Logowanie();
	$strona -> przyciski = array(
                        );
	$strona -> nazwadzialu = "Logowanie";
	$strona -> Wyswietl();
	
	if(isset($_GET['akcja'])){
	if($_GET['akcja']=="loguj"){

	$strona->FunkcjaLogowanie();
	
	}
	}
?>