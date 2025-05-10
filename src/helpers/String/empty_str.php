<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\empty_str' ) ) {
  /**
   * `empty('0') #=> true` になるので、代用関数を作った。
   * @param $str
   * @return bool
   */
  function empty_str ( $str ): bool {
    is_numeric( $str ) && $str = (string)$str;
    //empty('0') のかわりの関数なので、string 以外は empty() で返す。
    if ( !is_string( $str ) ) return empty( $str );
    //
    return strlen( trim( $str ) ) === 0 && $str !== '0';
  }
}
