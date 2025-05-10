<?php

namespace Takuya\Helpers\FileSystem;

use function Takuya\Helpers\String\str_rand;

if ( !function_exists( __NAMESPACE__.'\\mktempfile' ) ) {
  /**
   * @param string $prefix      prefix for tmpdir, 'myname' results in '/tmp/myname-XXXX'.
   * @param string $auto_remove stop auto remove tmpdir by register_shutdown_function, Default is auto remove(false).
   * @return string path to tmpdir.
   */
  
  function mktempfile ( string $prefix = 'php-mktempfile', bool $auto_remove = true, $use_sub_dir = false ): string {
    if ( $use_sub_dir ) {
      touch( $tmpname = mktempdir( $prefix, $auto_remove ).DIRECTORY_SEPARATOR.$prefix.str_rand() );
      return $tmpname;
    } else {
      $temp_file = sys_get_temp_dir().DIRECTORY_SEPARATOR.$prefix.str_rand();
      touch( $temp_file );
      $auto_remove && register_shutdown_function( function() use ( $temp_file ) {
        proc_open( ['rm', '-rf', $temp_file], [], $io );
      } );
      return $temp_file;
    }
  }
}
