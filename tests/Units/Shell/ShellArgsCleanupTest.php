<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\shell_args_cleanup;

class ShellArgsCleanupTest extends TestCase{
  public function test_shell_args_cleanup(){
    $this->assertEquals(['ls','-alt'],shell_args_cleanup('ls   -alt   '));
    // ファイル名は配列として入れればいいので、チェックする必要がない。
    //$this->assertEquals(['ls','-alt'],shell_args_cleanup('ls   -alt  "this is spaced.file" '));
  }
}