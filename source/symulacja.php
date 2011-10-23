<?php
session_start();
	require("strona.php");
	
	class Symulacja extends Strona {
	
	public function Lacz() {
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=biobattleground', 'root', '');
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
		}
	}
	
	public function Klimaty() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from klimat where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}

		return $wynik;
	}
	
	public function Mapy() {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from mapa where id_uzyt = :id");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}

		return $wynik;
	}
	
	public function Organizmy($gatunek) {
		$id_uzyt = $_SESSION["zalogowany"];
		$wynik = $this -> Lacz()->prepare("select * from organizm where id_uzyt = :id and typ = :gatunek");
		$wynik->bindParam(':id', $id_uzyt, PDO::PARAM_STR);
		$wynik->bindParam(':gatunek', $gatunek, PDO::PARAM_STR);
		$wynik->execute();
		if (!$wynik) {
			throw new Exception('Wyświetlenie jest niemożliwe.');
		}

		return $wynik;
	}
	
	
	public function WyswietlZawartosc() {
	
		echo "<h3>Organizmy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br>";
		
		echo "Rośliny:<br/>";
		echo "<select id=\"organismroslinaSelect\">";
		$gatunek = "Roslina";
		$stmt=$this -> Organizmy($gatunek);
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Roślinożercy:<br/>";
		echo "<select id=\"organismroslinozercaSelect\">";
		$gatunek = "Roslinozerca";
		$stmt=$this -> Organizmy($gatunek);
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Miesożercy:<br/>";
		echo "<select id=\"organismmiesozercaSelect\">";
		$gatunek = "Miesozerca";
		$stmt=$this -> Organizmy($gatunek);
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "Padlinożercy:<br/>";
		echo "<select id=\"organismpadlinozercaSelect\">";
		$gatunek = "Padlinozerca";
		$stmt=$this -> Organizmy($gatunek);
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select><br/><br/>";
		
		echo "</br></br><h3>Klimaty stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br></br>";
		echo "<select id=\"climateSelect\">";
		$stmt=$this -> Klimaty();
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select>";
		
		
		echo "</br></br><h3>Mapy stworzone przez użytkownika ".$_SESSION["zalogowany"].":</h3></br>";
		echo "<select id=\"mapSelect\">";
		$stmt=$this -> Mapy();
		foreach($stmt as $row)
		{
			echo '<option>'.$row['nazwa'].'</option>';
		} 
		echo "</select></br></br>";
		
		echo "<p><input type=\"button\" id=\"startSimulate\" value=\"Start symulacji\"></INPUT></p>";
		
		
	
	}
	}
	$strona = new Symulacja();
	$strona -> nazwadzialu = "Symulacja";
	$strona -> przyciski = array(
                        );
	$strona -> Wyswietl();
?>