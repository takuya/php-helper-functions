<?php

namespace Takuya\Helpers\Array;


if ( !function_exists( __NAMESPACE__ . '\\array_flatten' ) ) {
  function array_flatten ( array $array ): array {
    $result = [];
    foreach ( $array as $item ) {
      if ( is_array( $item ) ) {
        $result = array_merge( $result, array_flatten( $item ) );
      } else {
        $result[] = $item;
      }
    }
    
    return $result;
  }
}

