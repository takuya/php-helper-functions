<?php
namespace Takuya\Helpers\FileSystem;
if ( !function_exists( __NAMESPACE__.'\\get_extension' ) ) {
  function get_extension ( $f_name, $include_dot = true ): ?string {
    if ( $pos = strrpos( $f_name, '.' ) ) {
      return $include_dot ? substr( $f_name, $pos ) : trim( substr( $f_name, $pos ), '.' );
    }

    return null;
  }
}
