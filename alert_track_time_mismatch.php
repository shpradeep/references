<?php

define('SLACK_WEBHOOK_URL', 'https://hooks.slack.com/services/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');
define('SLACK_CHANNEL', '#track-duration-alert');

$mismatchMsg = 'This message is for testing purpose!';
notifyOnSlack($mismatchMsg);

/**
 * Send a Message to a Slack Channel.
 * @param string $message The message to post into a channel.
 */
function notifyOnSlack($message)
{
    $notifyToChannel = array(
        'channel' =>  SLACK_CHANNEL,
        'text' =>  $message
    );
    $payload = "payload=" . json_encode($notifyToChannel);
     
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, SLACK_WEBHOOK_URL);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_exec($ch);
    curl_close($ch);
}
