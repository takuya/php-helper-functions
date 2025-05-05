<?php
namespace Takuya\Helpers\Dates;

if ( !function_exists( __NAMESPACE__.'\\duration_time_percent' ) ) {
  function duration_time_percent ( string $current_time, string $duration, $decimals = 1 ): float {
    $percent_of_time = ( date_duration_to_int( $current_time )/date_duration_to_int( $duration ) )*100;
    return number_format( $percent_of_time, $decimals );
  }
}
