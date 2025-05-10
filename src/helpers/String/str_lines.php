<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\str_lines' ) ) {
  function str_lines ( string $str,$trim=false ): array {
    $str_io = new \SplTempFileObject( strlen( $str ) );
    $str_io->fwrite( $str );
    $str_io->rewind();
    if($trim){
      return array_map('trim',iterator_to_array( $str_io ) );
    }else{
      return iterator_to_array( $str_io );
    }
  }
}
