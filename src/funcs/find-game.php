<?php

use \Curl\Curl;

function findgame($name) {
  $curl = new Curl();
  $curl->get("https://rawg.io/api/games", [
    'search' => $name,
  ]);
  
  if ($curl->response->count > 0) {
    $firstGame = $curl->response->results[0];
   
    $curl2 = new Curl();
    $curl2->get("https://rawg.io/api/games/{$firstGame->slug}");
    
    return $curl2->response;
  }
  
  return null;
}