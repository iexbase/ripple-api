<?php
include_once '../vendor/autoload.php';

$address = "";
$tx = "";
$ripple = new \IEXBase\RippleAPI\Ripple($address);

// Получаем детали транзакции
dump($ripple->getTransaction($tx));