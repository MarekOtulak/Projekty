{extends file="../templates/main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<h3>Kalkulator kredytowy</h2>

<form action="{$app_url}/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<fieldset>
		<label for="id_kwota">Kwota pożyczki: </label>
		<input id="id_kwota" type="text" placeholder="Kwota" name="kwota" value="{$form['kwota']}">
		<label for="id_lat">Na ile lat: </label>
		<input id="id_lat" type="text" placeholder="Ilość lat" name="lat" value="{$form['lat']}">
		<label for="id_procent">Oprocentowanie: </label>
		<input id="id_procent" type="text" placeholder="Oprocentowanie" name="procent" value="{$form['procent']}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($rata_proc)}
	<h4>Twoja miesięczna rata kredytu wynosi: {$rata_proc} zł</h4>
	<a href="#two" id="myLink"></a>
    <script>
        document.getElementById('myLink').click(); // Automatyczne kliknięcie linku po załadowaniu strony
    </script>
{/if}

</div>

{/block}