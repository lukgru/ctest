<?php
$pdo = new PDO("mysql:host=localhost;dbname=cargomedia", "cargomedia", "cargomedia", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

\inc\registry\ApplicationRegistry::getInstance()->set("pdo", $pdo);
?>