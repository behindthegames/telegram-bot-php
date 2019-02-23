<?php

use \Curl\Curl;

function loadGameData($game) {
  $curl = new Curl();
  $curl->get("https://rawg.io/api/games/{$game->slug}");

  return $curl->response;
}