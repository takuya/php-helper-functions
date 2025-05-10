<?php

namespace Takuya\Helpers\FileSystem;


if ( !function_exists( __NAMESPACE__.'\\temp_file' ) ) {
  function temp_file ( string $prefix = 'php-tempfile', bool $auto_remove = true, ?callable $callback = null ): string {
    if ( $callback ) {
      try {
        $old_wd = getcwd();
        $fname = mktempfile( prefix: $prefix, auto_remove: $auto_remove ,use_sub_dir: true);
        chdir( dirname( $fname ) );
        call_user_func( $callback, $fname );
        return $fname;
      } finally {
        chdir( $old_wd );
      }
    } else {
      return mktempfile( $prefix, $auto_remove );
    }
  }
}
