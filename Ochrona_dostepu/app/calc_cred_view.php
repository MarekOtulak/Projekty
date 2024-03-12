<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8" />
		<title>Kalkulator kredytowy</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css" />
	</head>
	<body>
	
		<div style="width:90%; margin: 1.5em auto;">
			<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
			<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
		</div>
		
		<div style="width:90%; margin: 1.5em auto;">
			<form action="<?php print(_APP_URL);?>/app/calc_cred.php" method="post" class="pure-form pure-form-stacked">
				<legend>Kalkulator kredytowy</legend>
				<fieldset>
					<label for="id_kwota">Kwota pożyczki: </label>
					<br />
					<input id="id_kwota" type="text" name="kwota" value="<?php out($kwota) ?>" />
					<br />
					<label for="id_lat">Na ile lat: </label>
					<br />
					<input id="id_lat" type="text" name="lat" value="<?php out($lat) ?>" />
					<br />
					<label for="id_procent">Oprocentowanie: </label>
					<br />
					<input id="id_procent" type="text" name="procent" value="<?php out($procent) ?>" />
					<br />
				</fieldset>
				<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
			</form>	

			<?php
			//wyświeltenie listy błędów, jeśli istnieją
			if (isset($messages)) {
				if (count ( $messages ) > 0) {
					echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
					foreach ( $messages as $key => $msg ) {
						echo '<li>'.$msg.'</li>';
					}
					echo '</ol>';
				}
			}
			?>

			<?php if (isset($rata_proc)){ ?>
			<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #19dc75; width:300px;">
				<?php echo 'Twoja miesięczna rata wynosi: '.$rata_proc.' zł'; ?>
			</div>
			<?php } ?>
		</div>

	</body>
</html>