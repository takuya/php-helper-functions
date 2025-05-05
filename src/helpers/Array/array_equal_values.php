<?php

namespace Takuya\Helpers\Array;
if ( !function_exists( __NAMESPACE__.'\\array_equal_values' ) ) {
  function array_equal_values ( array $a, array $b ): bool {
    return [] === array_diff( array_values( $a ), array_values( $b ) );
  }
}

