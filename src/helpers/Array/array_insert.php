<?php

namespace Takuya\Helpers\Array;

if ( !function_exists( __NAMESPACE__ . '\\array_insert' ) ) {
  /**
   * Get the last element from an array.
   * @param array $arr
   * @return mixed
   */
  function array_insert ( array $arr, $idx, mixed $vars ): mixed {
    array_splice( $arr, $idx, 0, $vars );
    return $arr;
  }
}

