<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\str_cut' ) ) {
  /**
   * GNU utils cut command in php
   * same to `cut -d ',' -f 1`.
   * @param $line
   * @param $field
   * @param $delim
   * @param $max
   * @return mixed|string
   */
  function str_cut ( $line, $field = 1, $delim = '/\s+/', $max = -1 ) {
    if ( !str_starts_with( '/', $delim ) && str_ends_with( '/', $delim ) ) {
      $delim = "/{$delim}/";
    }
    $ret = preg_split( $delim, $line, $max );

    return $ret[$field - 1];
  }
}
