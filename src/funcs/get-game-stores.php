<?php

function getGameStores($game) {
  $res = [];
  
  foreach ($game->stores as $store) {
    $res[] = "[{$store->store->name}]({$store->url})";
  }
   
  if (count($res) > 0) {
    return '*Stores*: ' . implode(', ', $res) . "\n";
  }
  
  return '';
}