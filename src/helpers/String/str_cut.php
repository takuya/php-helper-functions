<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\str_cut' ) ) {
  function str_cut ( $line, $field = 1, $delim = '/\s+/', $max = -1 ) {
    if ( !str_starts_with( '/', $delim ) && str_ends_with( '/', $delim ) ) {
      $delim = "/{$delim}/";
    }
    $ret = preg_split( $delim, $line, $max );

    return $ret[$field - 1];
  }
}
