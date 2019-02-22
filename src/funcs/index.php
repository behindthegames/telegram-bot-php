<?php

function include_dir($directory)
{
  foreach (glob("{$directory}/*.php") as $filename) {
    require_once $filename;
  }
}

array_map('include_dir', [
  __DIR__,
]);