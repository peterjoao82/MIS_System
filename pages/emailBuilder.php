<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// Configure API key authorization: partner-key
$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', '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');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    // new GuzzleHttp\Client(),
    // $config
);
$sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
  	 'subject' => 'from the PHP SDK!',
     'sender' => ['name' => 'Contact', 'email' => 'no-reply@oneshorts.in'],
     'replyTo' => ['name' => 'Feedback', 'email' => 'no-reply@oneshorts.in'],
     'to' => [[ 'name' => 'Max Mustermann', 'email' => 'example@example.com']],
     'htmlContent' => '<html><body><h1>This is a Feedback email {{params.bodyMessage}}</h1></body></html>',
     'params' => ['bodyMessage' => 'made just for you!']
]); // \Brevo\Client\Model\SendSmtpEmail | Values to send a transactional email

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}
?>