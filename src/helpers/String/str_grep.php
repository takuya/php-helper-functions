<?php
namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\str_grep' ) ) {
  function str_grep ( $str, $regex_pattern ) {
    $str_io = new \SplTempFileObject( strlen( $str ) );
    $str_io->fwrite( $str );

    return preg_grep( $regex_pattern, iterator_to_array( $str_io ) );
  }
}
