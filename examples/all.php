<?php
include_once '../vendor/autoload.php';

$address = "";
$tx = "";
$ripple = new \IEXBase\RippleAPI\Ripple($address);

//История транзакций
dump($ripple->getAccountPayments());

// Баланс учетной записи
dump($ripple->getAccountBalances());

// Детали сервера
dump($ripple->getServerInfo());

// Получаем детали транзакции
dump($ripple->getTransaction($tx));

// Пинг от сервера
dump($ripple->getPing());