<?php

namespace Takuya\Helpers\FileSystem;

use function Takuya\Helpers\String\str_rand;

if ( !function_exists( __NAMESPACE__.'\\mktempdir' ) ) {
  /**
   * @param string $prefix      prefix for tmpdir, 'myname' results in '/tmp/myname-XXXX'.
   * @param string $auto_remove stop auto remove tmpdir by register_shutdown_function, Default is auto remove(false).
   * @return string path to tmpdir.
   */
  
  function mktempdir ( string $prefix = 'php-mktempdir', bool $auto_remove = true ): string {
    $temp_dir = sys_get_temp_dir().DIRECTORY_SEPARATOR.$prefix.str_rand();
    mkdir($temp_dir, 0777, true);
    $auto_remove && register_shutdown_function(function () use ( $temp_dir ) {
      proc_open(['rm', '-rf', $temp_dir], [], $io);
    });
    return $temp_dir;
  }
}
