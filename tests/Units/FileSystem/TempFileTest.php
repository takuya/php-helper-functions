<?php

namespace Takuya\Tests\Units\FileSystem;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\temp_file;

class TempFileTest extends TestCase {
  public function test_make_temp_file_ensure_removed () {
    $name = $this->run_php_script_body( <<<EOS
      use function Takuya\Helpers\FileSystem\\temp_file;
      temp_file(callback:function(){ echo getcwd();});
      EOS
    );
    $this->assertFalse( file_exists( $name ) );
  }
  
  public function test_temp_file_ensure_wd_is_not_changed () {
    //
    // ensure wd is not changed
    //
    $wd = getcwd();
    $out = [];
    $tmpfile = temp_file( callback: function( $fname ) use ( &$out ) {
      $out = ['fname' => $fname, 'dir' => getcwd()];
    } );
    $this->assertEquals( $tmpfile, $out['fname'] );
    $this->assertEquals( getcwd(), $wd );
    $this->assertNotEquals( getcwd(), $out['dir'] );
  }
}