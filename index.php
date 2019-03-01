<?php

ini_set('error_reporting',        E_ALL );
ini_set('display_errors',         1     );
ini_set('display_startup_errors', 1     ); 

require_once(__DIR__ . '/php/transferData.php'   ); // CURL
require_once(__DIR__ . '/php/userField.php'      ); // Создание пользовательских полей
require_once(__DIR__ . '/php/essence.php'        ); // Создание лида


//$webHookScript = 'https://bitrix24.com.ua/rest/1/epu7yjjk4i4q026j/';
$webHookScript = 'ваш вебхук';

$userfield  = 	new userField($webHookScript)	;
$eseence	=   new essenceAdd($webHookScript)	;

$listData   =   array(
    'order'  => array("STAGE_ID"    => "ASC"),
    'filter' => array("CONTACT_ID"  => '23')  ,
    'select' => array("*","UF_*"),
);

print_r($eseence->dealList($listData)) ;
?>