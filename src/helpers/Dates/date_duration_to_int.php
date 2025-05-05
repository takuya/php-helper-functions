<?php
namespace Takuya\Helpers\Dates;
if ( !function_exists( __NAMESPACE__.'\\date_duration_to_int' ) ) {
  function date_duration_to_int ( $str ): int {
    $rounded = 0;
    if ( str_contains( $str, '.' ) ) {
      preg_match( '/(\.\d+)/', $str, $m );
      $milli = $m[1];
      $rounded = intval( round( floatval( $milli ) ) );
      $str = str_replace( $milli, '', $str );
    }

    return strtotime( $str ) - strtotime( '00:00:00' ) + $rounded;
  }
}
