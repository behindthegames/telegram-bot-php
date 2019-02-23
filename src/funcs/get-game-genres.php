<?php

function getGameGenres($game) {
  $res = [];
  
  foreach ($game->genres as $gen) {
    $res[] = $gen->name ? $gen->name : $gen->genre->name;
  }
   
  if (count($res) > 0) {
    return '*Genres*: ' . implode(', ', $res) . "\n";
  }
  
  return '';
}