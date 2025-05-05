<?php

namespace Takuya\Helpers\Shell;
use function Takuya\Helpers\String\empty_str;
use function Takuya\Helpers\Array\array_flatten;

if ( !function_exists( __NAMESPACE__.'\\shell_args_cleanup' ) ) {
  function shell_args_cleanup ( array|string $args ) {
    if ( is_string( $args ) ) {
      $args =  preg_split('/(?:\s+)(?=(?:[^\'"]|\'[^\']*\'|"[^"]*")*$)/', trim($args));
    }
    $args = array_filter( $args, fn( $e ) => !empty_str( $e ) );
    $args = array_map( fn( $e ) => preg_split( '/\s+/', trim( $e ) ), array_flatten( $args ) );
    $args = array_flatten( $args );
    $args = array_filter( $args, fn( $e ) => !empty_str( $e ) );
    return $args;
  }
}
