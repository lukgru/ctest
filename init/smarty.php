<?php
require_once('libs/Smarty-3.1.14/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty->template_dir = "templates/";
$smarty->compile_dir = "templates_c/";
$smarty->compile_check = true;
$smarty->error_reporting = E_ALL;
$smarty->debugging = false;

\inc\registry\applicationRegistry::getInstance()->set("smarty", $smarty);
?>