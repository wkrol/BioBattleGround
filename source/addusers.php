<?php
session_start();
	require("strona.php");
	require("db2.php");
	class DodajUsera extends Strona {
	
	public function Wypelniony($zmienne_formularza) {
		foreach ($zmienne_formularza as $klucz => $wartosc) {
			if ((!isset($klucz)) || ($wartosc == '')) {
				return false;
			}
		}
		return true;
	}
	
	public function Rejestracja() {

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
			$opis=strip_tags($_POST['opis']);
		//}
		
		if(isset($POST["mistrz"])){
			$mistrz=$_POST['mistrz'];
		} else {
			$mistrz = "No";
		}
		
		if(isset($POST["admin"])){
			$admin=$_POST['admin'];
		} else {
			$admin = "No";
		}

		try {
     
			if (!($this -> Wypelniony($_POST))) {
				throw new Exception('Formularz wypełniony nieprawidłowo. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			}

        
			if ($haslo != $haslo2) {
				throw new Exception('Niepasujące do siebie hasła. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			}

    
			if (strlen($nazwa_uz) > 16) {
				throw new Exception('Nazwa uzytkownika nie może mieć więcej niż 16 znaków. <a href="addusers.php">Powróć do rejestracji i popraw dane.</a>');
			}

     
			if ((strlen($haslo) < 4) || (strlen($haslo) > 16)) {
				throw new Exception('Hasło musi mieć co najmniej 4 i maksymalnie 16 znaków — proszę wrócić i spróbować ponownie.');
			}

     		$db = new DB();
			$db -> Rejestruj($nazwa_uz, $haslo, $opis, $mistrz, $admin);
     
			
			echo 'Zarejestrowano! Powrót do strony głównej <a href="index.php">Idź do strony głównej.</a>';
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
			<td>Opis użytkownika:</td>
			<td><textarea name=\"opis\" cols=\"60\" rows=\"10\"></textarea></td></tr>
			<tr>
			<td>Nadaj prawa użytkownikowi: </td>
			<td>	 
			<input type=\"checkbox\" name=\"mistrz\" value=\"Yes\" />Mistrz Gry 

			<input type=\"checkbox\" name=\"admin\" value=\"Yes\" />Administrator 
			</td></tr>
			<tr>
			<td colspan=\"2\" align=\"center\">
			<input type=\"submit\" class=\"submit\" value=\"Rejestracja\"></td></tr>
			</table></form></br>* obowiązkowe pola do uzupełnienia
			";
	}
	}
	
	$strona = new DodajUsera();
	$strona -> nazwadzialu = "Administracja";
	$strona -> przyciski = array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
						"Zarządzaj użytkownikami"   => "adminusers.php"
                        );
	if(isset($_GET["akcja"])){
		if($_GET["akcja"]=="dodaj"){
			$strona -> Rejestracja();
		}
	}
	$strona -> Wyswietl();
?>