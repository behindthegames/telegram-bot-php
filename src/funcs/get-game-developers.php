<?php

function getGameDevelopers($game) {
  $devs = [];
  
  foreach ($game->developers as $dev) {
    $devs[] = "[{$dev->name}](https://rawg.io/developers/$dev->slug)";
  }
   
  if (count($devs) > 0) {
    return '*Developers*: ' . implode(', ', $devs) . "\n";
  }
  
  return '';
}