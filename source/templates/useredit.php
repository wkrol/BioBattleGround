<?php
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';
// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");
// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

require_once 'base/page.php';

class UsersEdit extends Page {
	public function Wypelniony($zmienne_formularza) {
		foreach ($zmienne_formularza as $klucz => $wartosc) {
			if ((!isset($klucz)) || ($wartosc == '')) {
				return false;
			}
		}
		return true;
	}
	
	public function edit() {

		//if(isset($POST["nazwa_uz"])){
			$nazwa_uz = $_POST['nazwa_uz'];
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
				throw new Exception('Formularz wypełniony nieprawidłowo.');
			}
        
			if ($haslo != $haslo2) {
				throw new Exception('Niepasujące do siebie hasła.');
			}
    
			if (strlen($nazwa_uz) > 16) {
				throw new Exception('Nazwa uzytkownika nie może mieć więcej niż 16 znaków.');
			} else if ((strlen($haslo) < 4) || (strlen($haslo) > 16)) {
				throw new Exception('Hasło musi mieć co najmniej 4 i maksymalnie 16 znaków — proszę wrócić i spróbować ponownie.');
			}

			$c = new Criteria();
     		$c->add(UserPeer::LOGIN, $nazwa_uz);
     		$users = UserPeer::doSelect($c);
			if(!$users){
				if(isset($_GET['id'])){
					$id = $_GET['id'];
				}
	     		$edituser = UserPeer::retrieveByPK($id);
	     		$edituser->setLogin($nazwa_uz);
	     		$edituser->setPassword($haslo);
	     		$edituser->setName($nazwa);
	     		$edituser->save();
				echo 'Zedytowano! Powrót do strony głównej <a href="index.php">Idź do strony głównej.</a>';
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
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$user = UserPeer::retrieveByPK($id);
			echo "
			<form method=\"POST\" action=\"?akcja=edytuj&id=".$id."\">
			<table>
			<tr>
			<td>Podaj nazwę użytkownika <br />(max. 16 znaków):</td>
			<td><input type=\"text\" name=\"nazwa_uz\"
                     size=\"16\" maxlength=\"16\" value=\"".$user->getLogin()."\"/>*</td></tr>
			<tr>
			<td>Podaj hasło <br />(4-25 znaków):</td>
			<td><input type=\"password\" name=\"haslo\"
                     size=\"16\" maxlength=\"25\" value=\"".$user->getPassword()."\"/>*</td></tr>
			<tr>
			<td>Powtórz hasło:</td>
			<td><input type=\"password\" name=\"haslo2\" size=\"16\" maxlength=\"16\" value=\"".$user->getPassword()."\"/>*</td></tr>
			<tr>
			<td>Nazwa:</td>
			<td><input type=\"text\" name=\"nazwa\"
                     size=\"16\" maxlength=\"16\" value=\"".$user->getName()."\"/>*</td></tr>
			
			<tr>
			<td colspan=\"2\" align=\"center\">
			<input type=\"submit\" class=\"submit\" value=\"Edytuj\"></td></tr>
			</table></form></br>* obowiązkowe pola do uzupełnienia
			";
			
		} 
		
		
	}
	
}
	$page = new UsersEdit();
	$page->setSubpageName("Administracja");
	$page ->setButtons(array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
                        ));
    if(isset($_GET["akcja"])){
		if($_GET["akcja"]=="edytuj"){
			$page->edit();
		}
	}
	$page ->render();
?>