<?php

function getGameCategories($game) {
  $res = [];
  
  foreach ($game->categories as $cat) {
    $res[] = $cat->name;
  }
   
  if (count($res) > 0) {
    return '*Categories*: ' . implode(', ', $res) . "\n";
  }
  
  return '';
}