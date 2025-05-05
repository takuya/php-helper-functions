<?php

namespace Takuya\Helpers\String;

if ( !function_exists( __NAMESPACE__.'\\string_io' ) ) {
  function string_io ($mega_bytes=5 ){
    return fopen('php://temp/maxmemory:'.( 1024*1024*$mega_bytes ), 'w+');
  }
}
