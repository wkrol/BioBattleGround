<?php
session_start();
require("strona.php");
// Include the main Propel script
require_once '../../vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init("../../build/conf/biobattleground-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../../build/classes" . PATH_SEPARATOR . get_include_path());

	class UsersProfile extends Strona {
	
	
	public function WyswietlZawartosc() {
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$user = UserPeer::retrieveByPK($id);
			echo '<h2>Podgląd użytkownika</h2><br/>Login: '.$user->getLogin().'<br/>Nazwa: '.$user->getName().'<br/><br/> <h2>Zarządzaj użytkownikiem</h2><br/><a href="?delete='.$user->getId().'">Usuń użytkownika</a><br/><a href="useredit.php?id='.$user->getId().'">Edytuj użytkownika</a>';
			
		} 
		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			$user = UserPeer::retrieveByPK($id);
			$user->delete();
			echo 'Usunięto!';
		} 
		
	}
	
	}
	$strona = new UsersProfile();
	$strona -> nazwadzialu = "Administracja";
	$strona -> przyciski = array("Startowa"   => "admin.php",
						"Wyświetl użytkowników"   => "viewusers.php",
						"Dodaj użytkownika"   => "addusers.php",
                        );
	$strona -> Wyswietl();
?>