<?php

function getGameInfo($game) {
//     $desc = strip_tags(nl2br($game->description));
    $released = property_exists($game, released) ? $game->released : 'TBA';
    $rating = getRating($game);
    $metacritic = getMetacritic($game);
    $links = getGameLinks($game);
    $devs = getGameDevelopers($game);
    $platforms = getGamePlatforms($game);
    $stores = getGameStores($game);
    $cats = getGameCategories($game);
    $genres = getGameGenres($game);
    $ans = <<<EOF
[{$game->name}](https://rawg.io/games/{$game->slug})
-------
*Release date*: {$released}
{$rating}{$metacritic}{$platforms}{$links}{$devs}{$stores}{$cats}{$genres}
EOF;
  
  return $ans;
}