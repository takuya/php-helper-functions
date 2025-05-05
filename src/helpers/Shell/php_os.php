<?php
namespace Takuya\Helpers\Shell;
if ( !function_exists( __NAMESPACE__.'\\php_os' ) ) {
  function php_os () {
    $os = php_uname( 'a' );
    if ( stripos( $os, 'Linux' ) !== false ) {
      if ( stripos( $os, 'Microsoft' ) !== false ) {
        return 'wsl';
      }

      return 'linux';
    } else {
      if ( stripos( $os, 'Darwin' ) !== false ) {
        return 'macOS';
      } else {
        return 'unknown';
      }
    }
  }
}

