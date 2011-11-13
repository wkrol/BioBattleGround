<?php
require_once 'base/page.php';
	
class StronaGlowna extends Page {
	
	public function WyswietlZawartosc() {
		echo 'Witaj w symulacji organizmów w modelu biologicznym "BioBattleGround"! <br/><br/>';
		if (!$_SESSION['zalogowany']) {
			echo 'By uzyskać dostęp do wszystkich możliwości systemu należy 
			<a href="register.php">posiadać własne konto</a> i <a href="logowanie.php">zalogować się</a>.';
		} else {
			echo '<strong>'.ucfirst($_SESSION['zalogowany']).'</strong>, aby rozpocząć korzystanie z serwisu, wybierz odpowiednią opcję z menu na górze strony.';
		}
		
	}
}


$page = new StronaGlowna();
$page->setSubpageName('Strona główna');
$page->render();
?>