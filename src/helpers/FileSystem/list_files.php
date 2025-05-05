<?php

namespace Takuya\Helpers\FileSystem;
use function Takuya\Helpers\Array\array_flatten;

if ( !function_exists( __NAMESPACE__ . '\\list_files' ) ) {
  /**
   * `find x -type f -exec realpath {}\;`
   * @param string|array $e
   * @return array
   */
  function list_files ( string|array $e ): array {
    if ( is_iterable( $e ) ) {
      return array_flatten( array_map( fn($f)=>list_files($f), $e ) );
    }
    if ( is_dir( $e ) ) {
      return list_files( glob( $e.'/*', ) );
    }
    return [realpath( $e )];
  }
}

