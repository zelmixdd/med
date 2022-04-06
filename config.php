<?php 
// połączenie z bazą danych
$db = new mysqli("localhost", "root", "", "med");
//moduły z composera
require_once("./vendor/autoload.php");
$smarty = new Smarty();

$smarty->setTemplateDir('./templates');
$smarty->setCompileDir('./templates_c');
$smarty->setCacheDir('./cache');
$smarty->setConfigDir('./configs');

$smarty->display("test.tpl");

?>