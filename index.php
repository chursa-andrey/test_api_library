<?php

require_once __DIR__ . '/PaymentAPI/vendor/autoload.php';

use PaymentAPI\Services\PaymentService;
use PaymentAPI\Services\SaleRequest;
use PaymentAPI\Utils\PaymentHashGenerator;
use PaymentAPI\Validators\Configs\SaleFieldsConfig;
use PaymentAPI\Validators\SaleRequestValidator;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$clientKey = $_ENV['CLIENT_KEY'];
$clientPass = $_ENV['CLIENT_PASS'];
$apiUrl = $_ENV['API_URL'];

$data = require 'config/payment_config.php';
$data['client_key'] = $clientKey;

$saleFieldsConfig = new SaleFieldsConfig();
$saleRequestValidator = new SaleRequestValidator($saleFieldsConfig);
$hashGenerator = new PaymentHashGenerator();

$request = SaleRequest::create(
    $data,
    $clientPass,
    $saleRequestValidator,
    $hashGenerator
);

$paymentService = new PaymentService($apiUrl);
$response = $paymentService->sendRequest($request);

if (!$response->isSuccessful()) {
    var_dump('Operation failed. Error code: ' . $response->getErrorCode() .
        '. ' . 'Error message: ' . $response->getErrorMessage());
    var_dump($response->getResponseData());
} else {
    var_dump($response->getResponseData());
}
