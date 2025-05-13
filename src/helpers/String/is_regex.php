<?php

namespace Takuya\Helpers\String;

if ( !function_exists( __NAMESPACE__.'\\is_regex' ) ) {
  /**
   * これ、エラー処理するから、とても時間がかかる処理。多用できないわ。
   * @param string      $regex         RegEx to be validated
   * @param string|null $error_message invalid message.
   * @return bool  true: valid regex false: invalid regex
   */
  function is_regex ( string $regex, ?string &$error_message = null ): bool {
    try {
      set_error_handler( function( $severity, $message ) { throw new \ErrorException( $message ); } );
      preg_match( $regex, " " );
      return true;
    } catch (\ErrorException $e) {
      $error_message = str_replace( 'preg_match(): ', '', $e->getMessage() );
      return false;
    } finally {
      restore_error_handler();
    }
  }
}
