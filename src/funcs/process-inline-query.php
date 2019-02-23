<?php

function processInlineQuery($req) {
  $gameName = $req->inline_query->query;

  $games = findGames($gameName);
  
  $answer = [];
  
  foreach($games as $game) {
    $info = [
      'type' => 'article',
      'id' => "game-{$game->id}",
      'title' => $game->name,
      'input_message_content' => [
        'message_text' => getGameInfo($game),
        'parse_mode' => 'markdown',
      ],
    ];
    
    // if ($game->background_image) {
    //   $info['thumb_url'] = str_replace('/media/', '/media/crop/150/150/', $game->background_image);
    // }
    
    $answer[] = $info;
  }
  
  if ($req->inline_query->id) {
    sendInlineAnswer($req->inline_query->id, $answer);
  } else {
    print_r($answer);
  }
  
}