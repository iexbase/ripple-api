<?php
include_once '../vendor/autoload.php';

$address = "";
$ripple = new \IEXBase\RippleAPI\Ripple($address);

dump($ripple->getAccount());