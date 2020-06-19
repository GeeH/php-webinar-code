<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

$telephoneNumber = '+447380336756';

$theBot = new \RopaporsBot\TheBot(new \RopaporsBot\Randomizer());
try {
    $result = $theBot->play($_POST['SpeechResult'] ?? 'Ummmmm');
} catch (InvalidArgumentException $e) {
    $result = 'Sorry, I didn\'t get that, valid moves are ROCK, PAPER, or SCISSORS';
}

$voiceResponse = new \Twilio\TwiML\VoiceResponse();
$voiceResponse->say($result);

echo $voiceResponse;
