<?php

function getRating($game) {
  $first = $game->ratings[0];
  
  if ($first->count > 0) {
    return "*Rating*: $first->title\n";
  }
  
  return '';
}