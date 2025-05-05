<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\php_os;

class PhpOsTest extends TestCase{
  public function test_php_os(){
    $this->assertNotEquals('unknown',php_os());
    $this->assertMatchesRegularExpression('/linux|wsl|macos/i',php_os());
  }
}