# MigratoryData Client for PHP 5.x #

Below you can find a tutorial and usage example. For more information please refer to 
[MigratoryData Documentation 5.x](https://migratorydata.com/documentation/5.x/api/client/desktop-apps/php/html/index.html).

## Usage ##
Install the MigratoryData client library 5.x using composer:
```console
$ composer require migratorydata/migratorydata-client-php:5.*
```

Create a MigratoryData client:

```php
require __DIR__ . '/vendor/autoload.php';

use MigratoryData\Client\MigratoryDataClient;
use MigratoryData\Client\MigratoryDataMessage;

$client = new MigratoryDataClient(); 
```

Initialize the MigratoryData client:

```php    
$client->setEntitlementToken("some-token");
$client->setServers(array("http://127.0.0.1:8800"));
```
 
Publish a message to MigratoryData server:
 
```php
$message = new MigratoryDataMessage("/server/status", time());
$response = $client->publish($message);
```

## Example client application ##

Copy the code below to a file named `echo-time-client.php` and run it using the following command:

```console  
$ php echo-time-client.php
```

The client application connects to the MigratoryData server deployed at `localhost:8800` and publishes a message every second on the subject `/server/status`.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use MigratoryData\Client\MigratoryDataClient;
use MigratoryData\Client\MigratoryDataException;
use MigratoryData\Client\MigratoryDataMessage;

$client = new MigratoryDataClient();
$client->setEntitlementToken("some-token");

try {
    $client->setServers(array("http://127.0.0.1:8800"));
} catch (MigratoryDataException $e) {
    $ex = $e->getExceptions();
    foreach ($ex as $a) {
        echo $a->getCause() . ' - ' . $a->getDetail() . "\n";
    }
}
while(true) {
    $start = microtime(true);

    $message = new MigratoryDataMessage("/server/status", time());
    try {
        $response = $client->publish($message);
    } catch (MigratoryDataException $e) {
        echo $e->getDetail() . "\n";
        $ex = $e->getExceptions();
        foreach ($ex as $a) {
            echo $a->getCause() . ' - ' . $a->getDetail() . "\n";
        }	
    }

    $end = microtime(true);

    echo $response . ' ' . ($end - $start) . ' ms' . "\n";

    sleep(1);
} 
```