<?php


namespace Takuya\Helpers\String;


if ( !function_exists( __NAMESPACE__.'\\size_format' ) ) {
  // original from wordpress
  // https://developer.wordpress.org/reference/functions/size_format/
  define( 'KB_IN_BYTES', 1024 );
  define( 'MB_IN_BYTES', 1024*KB_IN_BYTES );
  define( 'GB_IN_BYTES', 1024*MB_IN_BYTES );
  define( 'TB_IN_BYTES', 1024*GB_IN_BYTES );
  define( 'PB_IN_BYTES', 1024*TB_IN_BYTES );
  define( 'EB_IN_BYTES', 1024*PB_IN_BYTES );
  define( 'ZB_IN_BYTES', 1024*EB_IN_BYTES );
  define( 'YB_IN_BYTES', 1024*ZB_IN_BYTES );
  function size_format ( $bytes, $decimals = 1, $suffix = '' ) {
    $quant = [
      'YB' => YB_IN_BYTES,
      'ZB' => ZB_IN_BYTES,
      'EB' => EB_IN_BYTES,
      'PB' => PB_IN_BYTES,
      'TB' => TB_IN_BYTES,
      'GB' => GB_IN_BYTES,
      'MB' => MB_IN_BYTES,
      'KB' => KB_IN_BYTES,
      'B'  => 1,
    ];
    if ( 0 === $bytes ) {
      /* translators: Unit symbol for byte. */
      return number_format( 0, $decimals ).' '.'B'.$suffix;
    }
    foreach ( $quant as $unit => $mag ) {
      if ( (float)$bytes >= $mag ) {
        return number_format( $bytes/$mag, $decimals ).' '.$unit.$suffix;
      }
    }
    
    return false;
  }
}
