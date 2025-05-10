<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\ascii_chars' ) ) {
  function ascii_chars ( $alpha = true, $num = false, $symbol = false, $space = false ) {
    return array_map( fn( $e ) => chr( $e ), array_merge(
        
        $alpha ? range( 65, 90 ) : [],
        $alpha ? range( 97, 122 ) : [],
        $num ? range( 48, 57 ) : [],
        $symbol ? range( 33, 47 ) : [],
        $symbol ? range( 58, 64 ) : [],
        $symbol ? range( 91, 96 ) : [],
        $symbol ? range( 123, 126 ) : [],
        $space ? [32] : []
      )
    );
  }
}