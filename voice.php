<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

$telephoneNumber = '+447380336756';

$voiceResponse = new \Twilio\TwiML\VoiceResponse();
$voiceResponse->say('Which move would you like to play? Rock, Paper or Scissors?');
$voiceResponse->gather(
    [
        'input' => 'speech',
        'action' => 'https://geeh.ngrok.io/play.php',
    ]
);

echo $voiceResponse;
