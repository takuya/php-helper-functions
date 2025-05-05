<?php
namespace Takuya\Tests\Units\FileSystem;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\list_files;

class ListFilesTest extends TestCase{
  public function test_list_files(){
    $ret = list_files(realpath(__DIR__));
    $this->assertEquals(glob(__DIR__.'/*.php'),$ret);
  }
}