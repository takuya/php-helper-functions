<?php

namespace Takuya\Helpers\FileSystem;


if ( !function_exists( __NAMESPACE__.'\\temp_dir' ) ) {
  function temp_dir ( string $prefix = 'php-tempdir', bool $auto_remove = true, ?callable $callback = null ): string {
    if ( $callback ) {
      try {
        $old_wd = getcwd();
        $dir = mktempdir( $prefix, $auto_remove );
        chdir( $dir );
        call_user_func( $callback, $dir );
        return $dir;
      } finally {
        chdir( $old_wd );
      }
    } else {
      return mktempdir( $prefix, $auto_remove );
    }
  }
}
