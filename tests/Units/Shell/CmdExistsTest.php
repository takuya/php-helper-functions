<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\cmd_exists;

class CmdExistsTest extends TestCase{
  public function test_cmd_exists(){
    $this->assertEquals(true,cmd_exists('php'));
    $this->assertEquals(false,cmd_exists('php4.0.0.0'));
  }
}