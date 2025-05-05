<?php

namespace Takuya\Helpers\FileSystem;

if ( !function_exists( __NAMESPACE__.'\\file_unlink_if_exists' ) ) {
  /**
   * `find x -type f -exec realpath {}\;`
   * @param string $e
   * @return bool
   */
  function file_unlink_if_exists ( string $filename ): bool {
    return file_exists( $filename ) && unlink( $filename );
  }
}
