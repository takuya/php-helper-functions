<?php

namespace Takuya\Helpers;
$files = array_merge(
  glob( __DIR__.'/*.php' ),
  glob( __DIR__.'/*/*.php' ),
  glob( __DIR__.'/*/*/*.php' ) );
foreach ( $files as $e ) {
  require_once $e;
}

