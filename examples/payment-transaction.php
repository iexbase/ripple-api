<?php

use IEXBase\RippleAPI\Contracts\TransactionBuilderContract;
use IEXBase\RippleAPI\Support\TransactionType;

include_once '../vendor/autoload.php';

$address = "";
$secretKey = "";


$ripple = new \IEXBase\RippleAPI\Ripple($address, $secretKey);

try {
    $transfer = $ripple->buildTransaction(function (TransactionBuilderContract $item)
    {
        return $item
            ->setAmount(0.004)
            ->setDestinationTag(1)
            ->setDestination('')
            ->setTransactionType(TransactionType::PAYMENT)
            ->sign();
    })->submit();

} catch (Exception $e) {
    die($e->getMessage());
}

dump($transfer);