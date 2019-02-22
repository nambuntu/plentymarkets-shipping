<?php

use GuzzleHttp\Client;

$client    = new Client();
$method    = SdkRestApi::getParam('method'); // Method to be executed on Guzzle Client
$arguments = SdkRestApi::getParam('arguments'); // All the arguments passed to the guzzle method being called.

$data = [];
try {
  $response = call_user_func_array([$client, $method], $arguments);
  $data['body'] = $response->getBody();
  $data['statusCode'] = $response->getBody();
  $data['reasonPhrase'] = $response->getReasonPhrase();
  $data['headers'] = $response->getHeaders();
} catch (\Exception $e) {
  $data['error'] = $e->getMessage();
}

return $data;

