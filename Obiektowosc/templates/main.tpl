<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/main.css">
</head>

<body class="is-preload landing">
	<div id="page-wrapper">
		<header id="header">
			<h1 id="logo"><a href="#two">Kalkulator kredytowy</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="{$conf->app_url}/index.php">Home</a></li>
				</ul>
			</nav>
			<br /><br /><br /><br />
			<div id="button1" style="display: flex; justify-content: center; align-items: center;">
				<button type="button" href="#two" class="button scrolly">Oblicz swoją ratę</button>
			</div>
		</header>
		
		<!-- Pierwszy blok -->
		<div id="one" class="spotlight style1 bottom">
			<span class="image fit main">
				<img src="{$conf->app_url}/images/pic02.jpg" alt="" />
			</span>
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-4 col-12-medium">
							<header>
								<h2>{$page_header|default:"Tytuł domyślny"}</h1>
								<p>
									{$page_description|default:"Opis domyślny"}
								</p>
							</header>
						</div>
					</div>
				</div>
			</div>
			<a href="#two" class="goto-next scrolly">Next</a>
		</div>
		<!-- Drugi blok -->
		<div id="two" class="spotlight style3 left">
			<span class="image fit main bottom"><img src="{$conf->app_url}/images/pic04.jpg" alt="" /></span>
				<div class="content">
					{block name=content} Domyślna treść zawartości .... {/block}
				</div>
				<a href="#footer" class="goto-next scrolly">Next</a>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="https://github.com/marekotulak" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
				<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Marek Otulak 2024. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</footer>
	</div>

<!-- Scripts -->
<script src="{$conf->app_url}/js/jquery.min.js"></script>
<script src="{$conf->app_url}/js/jquery.scrolly.min.js"></script>
<script src="{$conf->app_url}/js/jquery.dropotron.min.js"></script>
<script src="{$conf->app_url}/js/jquery.scrollex.min.js"></script>
<script src="{$conf->app_url}/js/browser.min.js"></script>
<script src="{$conf->app_url}/js/breakpoints.min.js"></script>
<script src="{$conf->app_url}/js/util.js"></script>
<script src="{$conf->app_url}/js/main.js"></script>

</body>
</html>