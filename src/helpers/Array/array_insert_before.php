<?php

namespace Takuya\Helpers\Array;

if ( !function_exists( __NAMESPACE__.'\\array_insert_before' ) ) {
  /**
   * Get the last element from an array.
   * @param array $arr
   * @return mixed
   */
  function array_insert_before ( array $arr, mixed $needle, mixed $vars ): mixed {
    return array_insert( $arr, array_search( $needle, $arr ), $vars );
  }
}

