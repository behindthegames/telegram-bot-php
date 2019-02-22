<?php

use \Curl\Curl;

function sendMessage($req, $text) {
  $curl = new Curl();
  $curl->post('https://api.telegram.org/***REMOVED***/sendMessage', [
    'chat_id' => $req->message->chat->id,
    'text' => $text,
    'parse_mode' => 'markdown',
  ]);
}