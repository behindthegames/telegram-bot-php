<?php

use \Curl\Curl;

function findGame($name) {
  $curl = new Curl();
  $curl->get("https://rawg.io/api/games", [
    'search' => $name,
  ]);
  
  if ($curl->response->count > 0) {
    $firstGame = $curl->response->results[0];
   
    return loadGameData($firstGame);
  }
  
  return null;
}