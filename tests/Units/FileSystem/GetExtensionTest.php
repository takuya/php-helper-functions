<?php
namespace FileSystem;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\get_extension;

class GetExtensionTest extends TestCase{
  public function test_get_extension(){
    $this->assertEquals('.php',get_extension('a.php'));
    $this->assertEquals('.mp4',get_extension('this.is.mp4'));
  }
}