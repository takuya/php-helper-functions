<?php

if ( !function_exists( 'dd' ) ) {
  function dd ( ...$args ) {
    //var_dump(debug_backtrace());
    dump( ...$args );
    exit;
  }
}
if ( !function_exists( 'dump' ) ) {
  function dump ( ...$args ) {
    echo "\n";
    foreach ( func_get_args() as $e ) {
      var_dump( $e );
    }
  }
}
