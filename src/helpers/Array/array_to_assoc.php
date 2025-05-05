<?php

namespace Takuya\Helpers\Array;

if ( !function_exists( __NAMESPACE__.'\\array_to_assoc' ) ) {
  function array_to_assoc ( array $src ): array {
    return array_combine( array_column( $src, 0 ), array_column( $src, 1 ) );
  }
}

