<?php
namespace Takuya\Tests\Units\FileSystem;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\temp_dir;

class TempDirTest extends TestCase{
  public function test_temp_dir(){
    $dir = $this->run_php_script_body(<<<EOS
      use function Takuya\Helpers\FileSystem\\temp_dir;
      temp_dir(callback:function(){ echo getcwd();});
      EOS);
    $this->assertFalse( file_exists( $dir ) );
    // ensure wd is not changed
    $wd = getcwd();
    $tmpdir = temp_dir(callback: function()use(&$dir){$dir=getcwd();});
    $this->assertEquals(getcwd(),$wd);
    $this->assertEquals($tmpdir,$dir);
    $this->assertNotEquals(getcwd(),$dir);
    
  }
}