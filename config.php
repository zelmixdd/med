<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    dziala
</body>
</html>
>>>>>>> a5612c5bdb0763362a562970a066ec142e3af68c
