<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\find_path;
use function Takuya\Helpers\String\str_rand;

class FindPathTest extends TestCase{
  public function test_find_path(){
    $this->assertEquals('/usr/bin/ls',find_path('ls'));
    $this->assertEquals('/usr/bin/php',find_path('php'));
  }
  public function test_no_exists_command_find_path(){
    $this->expectException(\RuntimeException::class);
    find_path('php'.str_rand());
  }
}