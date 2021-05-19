# MigratoryData Client for PHP 5.x & 6.x #

Below you can find a tutorial and usage example. For more information please refer to 
[MigratoryData Documentation 5.x](https://migratorydata.com/documentation/5.x/api/client/desktop-apps/php/html/index.html).
[MigratoryData Documentation 6.x](https://migratorydata.com/docs/sdks-enterprise/php/).

## Usage ##
Install the MigratoryData client library 5.x using composer (MigratoryData client version 5 can be used with MigratoryData Server 5.0.*):
```console
$ composer require migratorydata/migratorydata-client-php:5.*
```

Install the MigratoryData client library 6.x using composer (MigratoryData client version 6 can be used with the MigratoryData server 6.0.1 or later and the MigratoryData KE server 6.0.1 or later):
```console
$ composer require migratorydata/migratorydata-client-php:6.*
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

// call connect for client API for PHP v6
$client->connect();
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

Example for Client API for PHP V5
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
	// Exceptions with one of the error codes: 
	//		E_INVALID_URL_LIST
	//		E_CLUSTER_MEMBERS_CONNECTION_FAILED
	//		E_ENTITLEMENT_TOKEN
	// See the documenation of MigratoryDataException for more details
	echo("Exception: " . $e->getDetail() . "\n");
	exit(1);
}
while(true) {
    $start = microtime(true);

    $message = new MigratoryDataMessage("/server/status", time());
    try {
        $response = $client->publish($message);
    } catch (MigratoryDataException $e) {
		// Exception with one of the error codes:
		//		E_MSG_NULL
		//		E_MSG_FIELD_INVALID
		//		E_MSG_INVALID
		//		E_INVALID_SUBJECT
		//		E_INVALID_PROTOCOL
		// See the documentation of MigratoryDataException for more details
		echo("Exception: " . $e->getDetail() . "\n");
    }

    $end = microtime(true);

    echo $response . ' ' . ($end - $start) . ' ms' . "\n";

    sleep(1);
} 
```

Example for Client API for PHP V6
The client application connects to the MigratoryData server deployed at `localhost:8800` and publishes a message every second on the subject `/server/status`.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use MigratoryData\Client\MigratoryDataClient;
use MigratoryData\Client\MigratoryDataException;
use MigratoryData\Client\MigratoryDataMessage;

// Create a MigratoryData client
$client = new MigratoryDataClient();

try 
{
	// Attach the entitlement token to the client.
	$client->setEntitlementToken("some-token");

	// Connect to a MigratoryData server
	$client->setServers(array("http://127.0.0.1:8800"));
	$client->connect();
} 
catch (MigratoryDataException $e) 
{
	// Exceptions with one of the error codes: 
	//		E_INVALID_URL_LIST
	//		E_CLUSTER_MEMBERS_CONNECTION_FAILED
	//		E_ENTITLEMENT_TOKEN
	//		E_RUNNING
	// See the documenation of MigratoryDataException for more details
	echo("Exception: " . $e->getDetail() . "\n");
	exit(1);
}

while (true) 
{
	// Publish a message
	try 
	{
        $message = new MigratoryDataMessage("/server/status", time());
        $response = $client->publish($message);
		echo("Got response: " . $response . "\n");
	} 
	catch (MigratoryDataException $e) 
	{
		// Exception with one of the error codes:
        //		E_NOT_CONNECTED
		//		E_MSG_NULL
		//		E_MSG_INVALID
		//		E_INVALID_SUBJECT
		//		E_INVALID_PROTOCOL
		// See the documentation of MigratoryDataException for more details
		echo("Exception: " . $e->getDetail() . "\n");
	}
	
	sleep(1);
} 
```