<?php
namespace Takuya\Helpers\Reflections;

use function Takuya\Helpers\Array\array_last;

if ( !function_exists( __NAMESPACE__.'\\get_class_basename' ) ) {
  /**
   * Get ClassName without namespace.
   * @param object|string $arg
   * @return string
   */
  function get_class_basename ( object|string $arg ): string {
    is_object( $arg ) && $arg = get_class( $arg );

    return array_last( explode( '\\', $arg ) );
  }
}

