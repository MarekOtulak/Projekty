<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta charset="utf-8" />
		<title>Kalkulator kredytowy</title>
        <link rel="stylesheet" href="calc_cred_style.css" />
	</head>
	<body>
		<form action="<?php print(_APP_URL);?>/app/calc_cred.php" method="post">
			<label for="id_kwota">Kwota pożyczki: </label>
            <br />
			<input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) { print($kwota); } ?>" />
			<br />
			<label for="id_lat">Na ile lat: </label>
            <br />
			<input id="id_lat" type="text" name="lat" value="<?php if (isset($lat)) { print($lat); } ?>" />
			<br />
			<label for="id_proc">Oprocentowanie: </label>
            <br />
			<input id="id_proc" type="text" name="proc" value="<?php if (isset($procent)) { print($procent); } ?>" />
            <br />
			<input type="submit" value="Oblicz" />
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

	</body>
</html>