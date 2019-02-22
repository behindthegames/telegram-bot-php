<?php

function getGamePlatforms($game) {
  $res = [];
  
  foreach ($game->parent_platforms as $pl) {
    $res[] = $pl->platform->name;
  }
   
  if (count($res) > 0) {
    return '*Platforms*: ' . implode(', ', $res) . "\n";
  }
  
  return '';
}
