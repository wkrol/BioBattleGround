 <?php
 
	function Lacz() {
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=biobattleground', 'root', '');
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo 'Po³¹czenie nie mog³o zostaæ utworzone: ' . $e->getMessage();
		}
	}
	
	function Loguj($nazwa_uz, $haslo) {


		$wynik = $this -> Lacz()->prepare("select * from uzytkownicy where NAZWA = :nazwa and HASLO = :haslo");
			$wynik->bindParam(':nazwa', $nazwa_uz, PDO::PARAM_STR);
			$wynik->bindParam(':haslo', $haslo, PDO::PARAM_STR);
			$wynik->execute();
			if (!$wynik) {
				throw new Exception('Logowanie nie powiod³o siê.');
			}
		$count = $wynik->fetchColumn();
		if ($count>0) {
				return true;
		}else {
			throw new Exception('Logowanie nie powiod³o siê.');
		}
	}
	
?>