<?php

use \Curl\Curl;

function handleRequest() {
  try {
    $data = file_get_contents('php://input');

    if (!$data) {
      processInlineQuery((object) [
        'inline_query' => (object) [
          'query' => 'max payne',
        ],
      ]);

      exit('thanks');
    }

    $request = json_decode($data);

    if (property_exists($request,'inline_query')) {
      processInlineQuery($request);
      exit('thanks');
    }

    if (! property_exists($request,'message')) {
      exit('thanks');
    }

    if (mb_strpos($request->message->text, 'Release date:') !== false) {
      exit('thanks');
    }

    $gameName = explode(' ', $request->message->text);
    
    if ($gameName[0] === '/g' or $gameName[0] === '/g@rawg_games_bot') {
      $gameName = array_slice($gameName, 1);
    }

    if (count($gameName) === 0) {
      sendMessage($request, 'Please, use command "/g some game" to search for games.');
      exit('thanks');
    }

    $gameName = implode(' ', $gameName);

    $game = findGame($gameName);
    $ans = '';

    if ($game) {
      $ans = getGameInfo($game);
    } else {
      $ans = 'Sorry, but i didn\'t finded that title :( Try different name.';
    }

    sendMessage($request, $ans);

    exit('thanks');
  } catch(Exception $err) {
    exit('thanks');
  }
}