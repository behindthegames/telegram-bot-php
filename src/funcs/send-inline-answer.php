<?php

use \Curl\Curl;

function sendInlineAnswer($id, $results) {
  $curl = new Curl();
  $curl->post('https://api.telegram.org/***REMOVED***/answerInlineQuery', [
    'inline_query_id' => $id,
    'results' => json_encode($results),
    'cache_time' => 6000,
  ]);
}