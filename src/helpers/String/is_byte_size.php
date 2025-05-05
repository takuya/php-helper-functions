<?php
namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\is_byte_str' ) ) {
  // A suffix of "K", "M", "G", or "T" can  be  added  to  denote  kibibytes (*1024), mebibytes, and so on.
  function is_byte_size ( $str ): bool {
    return 0 < preg_match( '/^([1-9]+\d*\.?\d*|0+\.\d*[1-9])[kmgtKMGT]?$/', $str );
  }
}
