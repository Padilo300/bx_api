<?php

ini_set('error_reporting',        E_ALL );
ini_set('display_errors',         1     );
ini_set('display_startup_errors', 1     ); 

require_once(__DIR__ . '/php/transferData.php'   ); // CURL
require_once(__DIR__ . '/php/userField.php'      ); // Создание пользовательских полей
require_once(__DIR__ . '/php/essence.php'        ); // Создание лида

$webHookScript = 'ваш вебхук';

$userfield  = 	new userField($webHookScript)	;
$eseence	=   new essenceAdd($webHookScript)	;
$getFields	=	new getFields($webHookScript )	;

$eseence->leadList();
?>