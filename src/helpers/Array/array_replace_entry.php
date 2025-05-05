<?php

namespace Takuya\Helpers\Array;

if ( !function_exists( __NAMESPACE__.'\\array_replace_entry' ) ) {
  /**
   * Get the last element from an array.
   * @param array $arr
   * @return mixed
   */
  define( 'ARRAY_REPLACE_ALL', true );
  function array_replace_entry ( array $arr, mixed $needle, mixed $vars, $all = !ARRAY_REPLACE_ALL ): mixed {
    if ( $needle === $vars ) {
      throw new \LogicException( 'search $needle equals replace $vars' );
    }
    if ( !in_array( $needle, $arr ) ) {
      return $arr;
    }
    do {
      $arr = array_replace( $arr, [array_search( $needle, $arr ) => $vars] );
    } while ( $all && false !== in_array( $needle, $arr ) );
    return $arr;
  }
}

