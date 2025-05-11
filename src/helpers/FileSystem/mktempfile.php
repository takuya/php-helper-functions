<?php

namespace Takuya\Helpers\FileSystem;

use function Takuya\Helpers\String\str_rand;

if ( !function_exists( __NAMESPACE__.'\\mktempfile' ) ) {
  /**
   * @param string $prefix      prefix for tmpdir, 'myname' results in '/tmp/myname-XXXX'.
   * @param string $auto_remove stop auto remove tmpdir by register_shutdown_function, Default is auto remove(false).
   * @return string path to tmpdir.
   */
  
  function mktempfile (
    string $prefix = 'php-mktempfile',
    string $extension = '.tmp',
    bool   $auto_remove = true,
    bool   $use_sub_dir = false
  ): string {
    //
    $extension = '.'.ltrim( $extension, '.' );
    $prefix = trim($prefix,DIRECTORY_SEPARATOR);
    $name = $prefix.str_rand(8).$extension;
    //
    if ( $use_sub_dir ) {
      touch( $tmpname = mktempdir( $prefix, $auto_remove ).DIRECTORY_SEPARATOR.$name );
      return $tmpname;
    } else {
      touch( $temp_file = sys_get_temp_dir().DIRECTORY_SEPARATOR.$name );
      $auto_remove && register_shutdown_function( fn()=>file_exists( $temp_file ) && @unlink( $temp_file ));
      return $temp_file;
    }
  }
}
