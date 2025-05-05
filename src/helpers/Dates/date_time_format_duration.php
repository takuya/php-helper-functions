<?php
namespace Takuya\Helpers\Dates;
if ( !function_exists( __NAMESPACE__.'\\date_time_format_duration' ) ) {
  function date_time_format_duration ( int $seconds ): string {
    $s = $seconds%60;
    $m = intval( ( $seconds%3600 )/60 );
    $h = intval( $seconds/3600 );

    return sprintf( '%02d:%02d:%02d', $h, $m, $s );
  }
}
