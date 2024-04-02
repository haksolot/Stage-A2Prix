<?php

require 'C:/php/vendor/autoload.php';
$smarty = new \Smarty\Smarty;
// $smarty = new Smarty();

$smarty->setTemplateDir('./template');
$smarty->setConfigDir('./config');
$smarty->setCompileDir('./compile');
$smarty->setCacheDir('./cache');
?>