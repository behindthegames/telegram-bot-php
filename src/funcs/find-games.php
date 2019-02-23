<?php

use \Curl\Curl;

function findGames($name) {
  $curl = new Curl();
  $curl->get("https://rawg.io/api/games", [
    'search' => $name,
    'page_size' => 15,
  ]);
  
  $games = [];
  
  foreach($curl->response->results as $game) {
    $games[] = loadGameData($game);
  }
  
  return $games;
}