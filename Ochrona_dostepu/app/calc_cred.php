<?php
require_once dirname(__FILE__).'/../config.php';
// KONTROLER strony kalkulatora

include _ROOT_PATH.'/app/security/check.php';

// pobranie parametrów
function getParams(&$kwota,&$lat,&$procent){
	$kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null ;
	$lat = isset($_REQUEST ['lat']) ? $_REQUEST ['lat'] : null ;
	$procent = isset($_REQUEST ['procent']) ? $_REQUEST ['procent'] : null ;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku, sprawdzenie, czy parametry zostały przekazane
function validate(&$kwota,&$lat,&$procent,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lat) && isset($procent))) {
		//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		//$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.'; - teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty pożyczki';
	}
	if ( $lat == "") {
		$messages [] = 'Nie podano na ile lat wzięto kredyt';
	}
	if ( $procent == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	//nie ma dalszej walidacji, gdy brak parametrów
	if (count ( $messages ) != 0) {
		return false;
	}

	// sprawdzenie, czy $kwota, $lat i $procent są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota pożyczki nie jest liczbą całkowitą';
	}
	if (! is_numeric( $lat )) {
		$messages [] = 'Ilość lat nie jest liczbą całkowitą';
	}
	if (! is_numeric( $procent )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}
		
	if (count ( $messages ) != 0) {
		return false;
	}
	else {
		return true;
	}
}

function process(&$kwota,&$lat,&$procent,&$messages,&$rata_proc){
	global $role;
	
	//konwersja parametrów na liczby całkowite (int)
	$kwota = intval($kwota);
	$lat = intval($lat);
    $procent = intval($procent);
	
	if($kwota <= 100000){
		//obliczanie miesięcznej raty z procentem 
		$miesiace = $lat * 12;
		$rata = $kwota / $miesiace;
		$procent_100 = $procent / 100;
		$rata_proc = $rata + $rata * $procent_100;
		$rata_proc = round($rata_proc, 2);
	}
	else{
		if ($kwota > 100000 && $role == 'manager'){
			$miesiace = $lat * 12;
			$rata = $kwota / $miesiace;
			$procent_100 = $procent / 100;
			$rata_proc = $rata + $rata * $procent_100;
			$rata_proc = round($rata_proc, 2);
		} else {
			$messages [] = 'Tylko menadżer może udzielić pożyczki powyżej 100 tysięcy!!!';
		}
	}
}
//definicja zmiennych kontrolera
$kwota = null;
$lat = null;
$procent = null;
$messages = array();
$rata_proc = null;

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lat,$procent);
if ( validate($kwota,$lat,$procent,$messages) ) { // gdy brak błędów
	process($kwota,$lat,$procent,$messages,$rata_proc);
}

// Wywołanie widoku z przekazaniem zmiennych - zainicjowane zmienne ($messages,$kwota,$lat,$procent,$rata_proc) będą dostępne w dołączonym skrypcie
include 'calc_cred_view.php';