<?php

class SimpleLogger {
  static $logger;
  static function instance() {
    if (!self::$logger) {
      self::$logger = new \Katzgrau\KLogger\Logger(__DIR__.'/../../logs');
    }
    
    return self::$logger;
  }
}

function logData($title, $data = null) {
  $logger = SimpleLogger::instance();
  
  if ($data) {
    $logger->debug($title, $data);
  } else {
    $logger->info($title);
  }
} 