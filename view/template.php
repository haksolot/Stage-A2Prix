<?php
require 'C:/php/vendor/autoload.php';
$smarty = new \Smarty\Smarty;
// $smarty = new Smarty();

$smarty->setTemplateDir('view/template');
$smarty->setConfigDir('view/config');
$smarty->setCompileDir('view/compile');
$smarty->setCacheDir('view/cache');
?>