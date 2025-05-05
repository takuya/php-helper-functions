<?php

namespace Takuya\Helpers\Array;

if ( !function_exists( __NAMESPACE__.'\\array_last' ) ) {
  /**
   * Get the last element from an array.
   * @param array $arr
   * @return mixed
   */
  function array_last ( array $arr ): mixed {
    return end( $arr );
  }
}

