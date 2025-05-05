<?php
namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\path_diff' ) ) {
  function path_diff ( $from_a, $to_b ): string {
    $a = explode( '/', $from_a );
    $b = explode( '/', $to_b );
    $c = array_diff_assoc( $a, $b );
    return implode( '/', $c );
  }
}
