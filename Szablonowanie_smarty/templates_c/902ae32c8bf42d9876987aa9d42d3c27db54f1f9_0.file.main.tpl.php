<?php
/* Smarty version 4.3.2, created on 2024-03-18 20:19:25
  from 'C:\Program Files\xampp\htdocs\Projekty\Szablonowanie_smarty\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65f893bd597d50_76869041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '902ae32c8bf42d9876987aa9d42d3c27db54f1f9' => 
    array (
      0 => 'C:\\Program Files\\xampp\\htdocs\\Projekty\\Szablonowanie_smarty\\templates\\main.tpl',
      1 => 1710789563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f893bd597d50_76869041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
	<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/css/main.css">
</head>

<body class="is-preload landing">
	<div id="page-wrapper">
		<header id="header">
			<h1 id="logo"><a href="#two">Kalkulator kredytowy</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/index.php">Home</a></li>
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
				<img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/images/pic02.jpg" alt="" />
			</span>
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-4 col-12-medium">
							<header>
								<h2><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_header']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
								<p>
									<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>

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
			<span class="image fit main bottom"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/images/pic04.jpg" alt="" /></span>
				<div class="content">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163845018865f893bd596ad1_39663998', 'content');
?>

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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_163845018865f893bd596ad1_39663998 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_163845018865f893bd596ad1_39663998',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
