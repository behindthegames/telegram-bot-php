<?php

function getGameLinks($game) {
  $links = [];
  
  if ($game->website) {
    $links[] = "[website]($game->website)";
  }

  if ($game->reddit_url) {
    $links[] = "[reddit]($game->reddit_url)";
  }
  
  if (count($links) > 0) {
    return '*Links*: ' . implode(', ', $links) . "\n";
  }
  
  return '';
}