<?php

namespace Takuya\Helpers\Shell;
if ( !function_exists( __NAMESPACE__.'\\find_path' ) ) {
  function find_path ( $command ): string {
    putenv( "cmd_name={$command}" );
    $path = trim( shell_exec( "which \"\$cmd_name\"" ) ?? '' );
    putenv( "cmd_name" );
    if ( empty( $path ) ) {
      throw new \RuntimeException( "{$command} is not found in path" );
    }
    
    return $path;
  }
}
