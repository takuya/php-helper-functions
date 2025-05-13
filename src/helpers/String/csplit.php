<?php

namespace Takuya\Helpers\String;

if ( !function_exists( __NAMESPACE__.'\\csplit' ) ) {
  /**
   * shortcut to explode.
   * explode($delim, $str) is awful style.
   * explode() should be `explode($str, $delim=',')`;
   * preg_split is bad. preg_split should be `preg_split($str,$regex='/,/')`
   * `split(str)` is best, but split replaced to preg_split.
   *
   * @param string $str
   * @param string $delim default is ','
   * @return array
   */
  //
  //
  function csplit (string $str, string $delim='/,|\s+/',bool $trim=true):array{
    $split=fn($d,$s)=>is_regex($delim)?preg_split($d,$s):explode($d,$s);
    return $trim ? array_values(array_filter(array_map('trim',$split($delim,$str)),fn($e)=>!empty_str($e))):$split($delim,$str);
  }
}
