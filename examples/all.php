<?php
include_once '../vendor/autoload.php';

$address = "rBgGyvJSPbF8DS1ZW28nZAMFQJgvGVvxs6";
$tx = "2711AFC4B3C14B89176954427018127C58253516522CDD91A7B2ADD6E9081EB5";
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