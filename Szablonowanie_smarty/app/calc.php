<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['lat'] = isset($_REQUEST['lat']) ? $_REQUEST['lat'] : null;
	$form['procent'] = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwota']) && isset($form['lat']) && isset($form['procent']) )){
		return false;	
	}

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwota'] == "") {
		$msgs [] = 'Nie podano kwoty pożyczki';
	}
	if ( $form['lat'] == ""){
		$msgs [] = 'Nie podano na ile lat wzięto kredyt';
	}
	if ( $form['procent'] == ""){
		$msgs [] = 'Nie podano oprocentowania';
	}
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $form['kwota'] i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Kwota pożyczki nie jest liczbą';
		if (! is_numeric( $form['lat'] )) $msgs [] = 'Ilość lat nie jest liczbą';
		if (! is_numeric( $form['procent'] )) $msgs [] = 'Oprocentowanie nie jest liczbą';
	}
	
	if (count($msgs)>0){
		return false;
	}
	else{
		return true; 
	}
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$rata_proc){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia...';
	
	//konwersja parametrów na int
	$form['kwota'] = floatval($form['kwota']);
	$form['lat'] = floatval($form['lat']);
	$form['procent'] = floatval($form['procent']);
	
	//obliczanie miesięcznej raty z procentem 
	$miesiace = $form['lat'] * 12;
	$rata = $form['kwota'] / $miesiace;
	$procent_100 = $form['procent'] / 100;
	$rata_proc = $rata + $rata * $procent_100;
	$rata_proc = number_format($rata_proc, 2);
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$rata_proc = null;
	
getParams($form);
if ( validate($form,$infos,$messages) ){
	process($form,$infos,$messages,$rata_proc);
}

// 4. Przygotowanie danych dla szablonu
$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('rata_proc',$rata_proc);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl' );
