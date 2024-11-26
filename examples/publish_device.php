<?php
require 'vendor/autoload.php';

use AdminSdk\HttpApiClient;

$adminApiUrl = 'http://localhost:8100';

$adminApiClient = new HttpApiClient();
$adminApiClient->setBaseUrl($adminApiUrl);

$keyResponse = $adminApiClient->get('key');
$apiKey = $keyResponse['key'];

$admiClient = new AdminSdk\AdminClient($apiKey, $adminApiUrl);

$response = $admiClient->devices()->publish('BYRQ201160016');

print_r($response);
