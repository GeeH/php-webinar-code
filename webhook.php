<?php

declare(strict_types=1);

use Twilio\Rest\Client;

require_once('vendor/autoload.php');

$telephoneNumber = '+447380336756';

$theBot = new \RopaporsBot\TheBot(new \RopaporsBot\Randomizer());

try {
    $result = $theBot->play($_POST['Body'] ?? '');
} catch (InvalidArgumentException $e) {
    $result = $e->getMessage();
}

// MESSAGE OUTPUT
//$messagingResponse = new \Twilio\TwiML\MessagingResponse();
//$messagingResponse->message($result);
//
//echo $messagingResponse;


// VOICE OUTPUT
$voiceResponse = new \Twilio\TwiML\VoiceResponse();
$voiceResponse->say($result);

$client = new Client(getenv('TWILIO_ACCOUNT_SID'), getenv('TWILIO_AUTH_TOKEN'));
$client->calls
    ->create(
        $_POST['From'],
        $telephoneNumber,
        ['twiml' => (string)$voiceResponse]
    );

