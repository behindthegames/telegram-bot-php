<?php

function getMetacritic($game) {
  if ($game->metacritic) {
    return "*Metacritic*: $game->metacritic\n";
  }
  
  return '';
}