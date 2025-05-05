<?php

namespace Takuya\Tests\Units\FileSystem;

use Takuya\Tests\TestCase;
use Composer\Autoload\ClassLoader;
use function Takuya\Helpers\FileSystem\mktempdir;

class MktempdirTest extends TestCase {
  
  public function test_mktempdir () {
    $dir = mktempdir( 'php-tmpdir' );
    $this->assertTrue( is_dir( $dir ) );
    $this->stringContains( 'php-tmpdir', $dir );
    $this->stringContains( sys_get_temp_dir(), $dir );
  }
  
  public function test_ensure_removed_of_mktempdir () {
    $dir = $this->run_php_script_body(<<<EOS
    //
    use function Takuya\Helpers\FileSystem\mktempdir;
    echo mktempdir();
    EOS);
    $this->assertFalse( file_exists( $dir ) );
  }
  
  
}
