<?php
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';
// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");
// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

require_once 'base/page.php';

class RegisterUser extends Page {
	
	public function Wypelniony($zmienne_formularza) {
		foreach ($zmienne_formularza as $klucz => $wartosc) {
			if ((!isset($klucz)) || ($wartosc == '')) {
				return false;
			}
		}
		return true;
	}
	
	public function register() {

		//if(isset($POST["nazwa_uz"])){
			$nazwa_uz = strip_tags($_POST['nazwa_uz']);
		//}
		//if(isset($POST["haslo"])){
			$haslo = $_POST['haslo'];
		//}
		//if(isset($POST["haslo2"])){
			$haslo2=$_POST['haslo2'];
		//}
		//if(isset($POST["opis"])){
			$nazwa=$_POST['nazwa'];
		//}

		try {
			if (!($this -> Wypelniony($_POST))) {
				throw new Exception('Formularz wypełniony nieprawidłowo. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			}

			if ($haslo != $haslo2) {
				throw new Exception('Niepasujące do siebie hasła. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			}
    
			if (strlen($nazwa_uz) > 16) {
				throw new Exception('Nazwa uzytkownika nie może mieć więcej niż 16 znaków. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			} else if ((strlen($haslo) < 4) || (strlen($haslo) > 16)) {
				throw new Exception('Hasło musi mieć co najmniej 4 i maksymalnie 16 znaków — proszę wrócić i spróbować ponownie.');
			}

     		$c = new Criteria();
     		$c->add(UserPeer::LOGIN, $nazwa_uz);
     		$users = UserPeer::doSelect($c);
			if(!$users){
	     		$adduser = new User();
	     		$adduser->setLogin($nazwa_uz);
	     		$adduser->setPassword($haslo);
	     		$adduser->setName($nazwa);
	     		$adduser->save();
				echo 'Zarejestrowano! <a href="index.php">Wróć do strony głównej</a>, lub zostaniesz do niej przekierowany automatycznie';
				header('Location:index.php');
			}
			else {
				throw new Exception('Istnieje już użytkownik o podanym loginie!');
			}
		}
		catch (Exception $e) {
			echo $e->getMessage();  
			exit;
		}
	}
	
	public function WyswietlZawartosc() {
		echo "
			<form method=\"POST\" action=\"?akcja=dodaj\">
			<table>
			<tr>
			<td>Podaj nazwę użytkownika <br />(max. 16 znaków):</td>
			<td><input type=\"text\" name=\"nazwa_uz\"
                     size=\"16\" maxlength=\"16\"/>*</td></tr>
			<tr>
			<td>Podaj hasło <br />(4-25 znaków):</td>
			<td><input type=\"password\" name=\"haslo\"
                     size=\"16\" maxlength=\"25\"/>*</td></tr>
			<tr>
			<td>Powtórz hasło:</td>
			<td><input type=\"password\" name=\"haslo2\" size=\"16\" maxlength=\"16\"/>*</td></tr>
			<tr>
			<td>Nazwa:</td>
			<td><input type=\"text\" name=\"nazwa\"
                     size=\"16\" maxlength=\"16\"/>*</td></tr>
			
			<tr>
			<td colspan=\"2\" align=\"center\">
			<input type=\"submit\" class=\"submit\" value=\"register\"></td></tr>
			</table></form></br>* obowiązkowe pola do uzupełnienia
			";
	}
}


	/*
	 * Execute
	 */

	$page = new RegisterUser();
	$page ->setSubpageName("Rejestracja");
	$page ->setButtons(NULL);
	if(isset($_GET["akcja"])){
		if($_GET["akcja"]=="dodaj"){
			$page -> register();
		}
	}
	$page ->render();
?>