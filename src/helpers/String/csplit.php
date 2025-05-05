<?php

namespace Takuya\Helpers\String;

if ( !function_exists( __NAMESPACE__.'\\csplit' ) ) {
  /**
   * shortcut to explode.
   * explode($delim, $str) is awful.explode() should be `explode($str, $delim=',')`;
   * preg_split is bad. preg_split should be `preg_split($str,$regex='/,/')`
   * `split(str)` is best, but split replaced to preg_split.
   *
   * @param string $str
   * @param string $delim default is ','
   * @return array
   */
  //
  //
  function csplit (string $str, string $delim=','):array{
    return array_map('trim',explode($delim,$str));
  }
}
