<?php

namespace Takuya\Helpers\String;
if( ! function_exists(__NAMESPACE__.'\\ascii_chars') ) {
  function ascii_chars() {
    return array_map(function ( $e ) { return chr($e); }, array_merge(range(65, 90), range(97, 122)));
  }
}