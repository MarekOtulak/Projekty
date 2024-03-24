<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';
require_once $conf->root_path.'/app/CalcLicz_rate.class.php';

/** Kontroler kalkulatora
 * @author Marek Otulak
 */
class CalcCtrl {
	private $messages;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $licz_rate; //dane do obliczania miesiecznej raty

	//Konstruktor - inicjalizacja właściwości
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->messages = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->licz_rate = new CalcLicz_rate();
	}
	//Pobranie parametrów
	public function getParams(){
		$this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->lat = isset($_REQUEST ['lat']) ? $_REQUEST ['lat'] : null;
		$this->form->procent = isset($_REQUEST ['procent']) ? $_REQUEST ['procent'] : null;
	}
	
	/** Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lat ) && isset ( $this->form->procent ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			$this->messages->addError('Nie podano kwoty pożyczki');
		}
		if ($this->form->lat == "") {
			$this->messages->addError('Nie podano na ile lat wzięto kredyt');
		}
		if ($this->form->procent == "") {
			$this->messages->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->messages->isError()) {
			// sprawdzenie, czy $kwota i $lat są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				$this->messages->addError('Kwota pożyczki nie jest liczbą');
			}
			if (! is_numeric ( $this->form->lat )) {
				$this->messages->addError('Ilość lat nie jest liczbą');
			}
			if (! is_numeric ( $this->form->procent )) {
				$this->messages->addError('Oprocentowanie nie jest liczbą');
			}
		}
		return ! $this->messages->isError();
	}
	
	//Pobranie wartości, walidacja, obliczenie i wyświetlenie
	public function process(){
		$this->getparams();

		if ($this->validate()) {
			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->lat = intval($this->form->lat);
			$this->form->procent = intval($this->form->procent);
			$this->messages->addInfo('Parametry poprawne.');
				
			//obliczanie miesięcznej raty z procentem 
			$this->licz_rate->miesiace = $this->form->lat * 12;
			$this->licz_rate->rata = $this->form->kwota / $this->licz_rate->miesiace;
			$this->licz_rate->procent_100 = $this->form->procent / 100;
			$this->result->rata_proc = $this->licz_rate->rata + $this->licz_rate->rata * $this->licz_rate->procent_100;
			$this->result->rata_proc = number_format($this->result->rata_proc, 2);

			$this->messages->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}

	//Wygenerowanie widoku
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('messages',$this->messages);
		$smarty->assign('form',$this->form);
		$smarty->assign('rata_proc',$this->result->rata_proc);
		
		$smarty->display($conf->root_path.'/app/calc.tpl');
	}
}