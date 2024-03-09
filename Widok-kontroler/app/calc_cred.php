<?php
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$kwota = $_REQUEST ['kwota'];
$lat = $_REQUEST ['lat'];
$procent = $_REQUEST ['proc'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lat) && isset($procent))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
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
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	//konwersja parametrów na liczby całkowite (int)
	$kwota = intval($kwota);
	$lat = intval($lat);
    $procent = intval($procent);
	
	//obliczanie miesięcznej raty z procentem 
    $miesiace = $lat * 12;
	$rata = $kwota / $miesiace;
    $procent_100 = $procent / 100;
    $rata_proc = $rata + $rata * $procent_100;
    $rata_proc = round($rata_proc, 2);
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych - zainicjowane zmienne ($messages,$kwota,$lat,$procent,$rata_proc) będą dostępne w dołączonym skrypcie
include 'calc_cred_view.php';