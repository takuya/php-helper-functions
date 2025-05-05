<?php

namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\base64url_encode' ) ) {
  /**
   * url safe base64 .
   * @param $data
   * @return string
   */
  function base64url_encode ( $data ): string {
    return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' );
  }
}
if ( !function_exists( __NAMESPACE__.'\\base64url_decode' ) ) {
  /**
   * url safe base64 .
   * @param $data
   * @return string
   */
  function base64url_decode ( $data ): false|string {
    return base64_decode( str_pad( strtr( $data, '-_', '+/' ), strlen( $data )%4, '=', STR_PAD_RIGHT ) );
  }
}



