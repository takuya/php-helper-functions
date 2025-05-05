<?php
namespace Takuya\Tests\Units\FileSystem;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\rrmdir;

class RrmdirTest extends TestCase{
  public function test_rrmdir(){
    $base = sys_get_temp_dir().'/'.md5(random_bytes(1000));
    mkdir($dir = $base.'/a/b/c',0777,true);
    touch($file = $dir.'/sample.txt');
    rrmdir($base);
    //
    $this->assertFalse(file_exists($file));
    $this->assertFalse(file_exists($base));
    $this->assertFalse(is_dir($base));
    
  }
}