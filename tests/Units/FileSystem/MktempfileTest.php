<?php

namespace Takuya\Tests\Units\FileSystem;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\mktempfile;
use function Takuya\Helpers\FileSystem\mktempdir;

class MktempfileTest extends TestCase {
  public function test_mktempfile () {
    $fname = mktempfile( 'php-tmp-file-'.( $id = uniqid() ) );
    $this->assertTrue( is_file( $fname ) );
    $this->stringContains( 'php-tmp-file', $fname );
    $this->stringContains( $id, $fname );
    $this->stringContains( sys_get_temp_dir(), $fname );
  }
  
  public function test_mktempfile_in_sub_dir () {
    $fname = mktempfile( 'php-tmp-file-'.( $id = uniqid() ),use_sub_dir: true );
    $this->assertTrue( is_file( $fname ) );
    $this->stringContains( 'php-tmp-file', $fname );
    $this->stringContains( $id, $fname );
    $this->stringContains( sys_get_temp_dir(), $fname );
    $this->stringContains( 'php-tmp-file', dirname($fname) );
    $this->stringContains( $id, dirname($fname) );
    $this->stringContains( sys_get_temp_dir(), dirname($fname) );
  }
  
  public function test_ensure_removed_of_mktempfile () {
    $dir = $this->run_php_script_body( <<<EOS
    //
    use function Takuya\Helpers\FileSystem\mktempfile;
    echo mktempfile();
    EOS
    );
    $this->assertFalse( file_exists( $dir ) );
  }
  public function test_ensure_removed_of_mktempfile_in_sub_dir () {
    $dir = $this->run_php_script_body( <<<EOS
    //
    use function Takuya\Helpers\FileSystem\mktempfile;
    echo mktempfile(use_sub_dir: true);
    EOS
    );
    $this->assertFalse( file_exists( $dir ) );
    $this->assertFalse( file_exists( dirname($dir) ) );
  }
}