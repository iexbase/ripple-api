# ripple-api
A PHP API for interacting with the XRP Ledger

## Installation

The preferred method is via composer. Follow the installation instructions if you do not already have composer installed. Once composer is installed, execute the following command in your project root to install this library:

Installation is possible using Composer.

If you don't already use Composer, you can download the composer.phar binary:

curl -sS https://getcomposer.org/installer | php
Then install the library:

```
composer require iexbase/ripple-api
```

Additional examples are available in the [examples](examples/) directory 

## Usage

Use the Ripple

```php
$address = "";
$secret_key = "";

$ripple = new \IEXBase\RippleAPI\Ripple($address, $secret_key);

dump($ripple->getAccount()); 
```

## Features

+ Issue [rippled API](https://ripple.com/build/rippled-apis/) requests
+ Listen to events on the XRP Ledger (transaction, ledger, etc.)
+ Sign and submit transactions to the XRP Ledger

## More Information
+ [Ripple Developer Center](https://ripple.com/build/)

## Donations
Ripple: rKhWrsiQpUhcdjH3CkM8feHxcrsjSnEx9m
