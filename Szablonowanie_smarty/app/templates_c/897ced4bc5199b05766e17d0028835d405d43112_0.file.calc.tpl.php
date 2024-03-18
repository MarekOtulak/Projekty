<?php
/* Smarty version 4.3.2, created on 2024-03-18 20:15:28
  from 'C:\Program Files\xampp\htdocs\Projekty\Szablonowanie_smarty\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65f892d017c927_96653442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '897ced4bc5199b05766e17d0028835d405d43112' => 
    array (
      0 => 'C:\\Program Files\\xampp\\htdocs\\Projekty\\Szablonowanie_smarty\\app\\calc.tpl',
      1 => 1710679225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f892d017c927_96653442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_72531809265f892d0041ea6_81693010', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61765891565f892d0042972_75964568', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.tpl");
}
/* {block 'footer'} */
class Block_72531809265f892d0041ea6_81693010 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_72531809265f892d0041ea6_81693010',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_61765891565f892d0042972_75964568 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_61765891565f892d0042972_75964568',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator kredytowy</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<fieldset>
		<label for="id_kwota">Kwota pożyczki: </label>
		<input id="id_kwota" type="text" placeholder="Kwota" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['kwota'];?>
">
		<label for="id_lat">Na ile lat: </label>
		<input id="id_lat" type="text" placeholder="Ilość lat" name="lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['lat'];?>
">
		<label for="id_procent">Oprocentowanie: </label>
		<input id="id_procent" type="text" placeholder="Oprocentowanie" name="procent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['procent'];?>
">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['rata_proc']->value))) {?>
	<h4>Twoja miesięczna rata kredytu wynosi: <?php echo $_smarty_tpl->tpl_vars['rata_proc']->value;?>
 zł</h4>
	<a href="#two" id="myLink"></a>
    <?php echo '<script'; ?>
>
        document.getElementById('myLink').click(); // Automatyczne kliknięcie linku po załadowaniu strony
    <?php echo '</script'; ?>
>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
