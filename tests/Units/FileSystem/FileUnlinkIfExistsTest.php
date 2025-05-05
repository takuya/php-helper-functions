<?php
namespace Takuya\Tests\Units\FileSystem;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\FileSystem\file_unlink_if_exists;

class FileUnlinkIfExistsTest extends TestCase{
  public function test_file_unlink_if_exists(){
    $fname = '/tmp/php-unit-sample-'.md5(random_bytes(1024)).'.tmp';
    $this->assertEquals(false,file_unlink_if_exists($fname));
    touch($fname);
    $this->assertEquals(true,file_unlink_if_exists($fname));
    $this->assertEquals(false,file_exists($fname));
  }
}