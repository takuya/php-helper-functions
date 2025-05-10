<?php

namespace Takuya\Helpers\String;

if ( !function_exists( __NAMESPACE__.'\\cjoin' ) ) {
  /**
   * shortcut to implode(join).
   * implode($delim, $array) is awful style.
   * To use default delim,
   * implode() should be `implode($array, $delim=',')`;
   *
   * @param string $str
   * @param string $delim default is ','
   * @return array
   */
  //
  //
  function cjoin ( array $arr, $delim=','):string{
    return implode($delim,$arr);
  }
}
