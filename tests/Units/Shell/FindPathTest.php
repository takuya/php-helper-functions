<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\find_path;

class FindPathTest extends TestCase{
  public function test_find_path(){
    $this->assertEquals('/usr/bin/ls',find_path('ls'));
    $this->assertEquals('/usr/bin/php',find_path('php'));
  }
}