<?php

use \Curl\Curl;

function handleRequest() {
  $data = file_get_contents('php://input');
  
  if (!$data) {
    exit('thanks');
  }
  
  $request = json_decode($data);

  if (! property_exists($request,'message')) {
    exit('thanks');
  }

  $msg = explode(' ', $request->message->text);

  if (count($msg) <= 1 || ($msg[0] !== '/g' && $msg[0] !== '/g@rawg_games_bot')) {
    sendMessage($request, 'Please, use command /g to search for games.');
    exit('thanks');
  }

  $gameName = implode(' ', array_slice($msg, 1));
  
  $game = findgame($gameName);
  $ans = '';
  $ansAdv = '';
  
  if ($game) {
    $ans = getGameInfo($game);
  } else {
    $ans = 'Sorry, but i didn\'t finded that title :( Try different game.';
  }
  
  sendMessage($request, $ans);

  exit('thanks');
}