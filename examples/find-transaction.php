<?php
include_once '../vendor/autoload.php';

$address = "rBgGyvJSPbF8DS1ZW28nZAMFQJgvGVvxs6";
$tx = "81DA6BB94ECB56B4798115B14D3931A333FE97703CF50EA87439E353BFCC8C10";
$ripple = new \IEXBase\RippleAPI\Ripple($address);

// Получаем детали транзакции
dump($ripple->getTransaction($tx));