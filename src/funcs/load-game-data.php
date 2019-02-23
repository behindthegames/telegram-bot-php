<?php

use \Curl\Curl;

function loadGameData($game) {
  $firstGame = $curl->response->results[0];

  $curl2 = new Curl();
  $curl2->get("https://rawg.io/api/games/{$game->slug}");

  return $curl2->response;
}