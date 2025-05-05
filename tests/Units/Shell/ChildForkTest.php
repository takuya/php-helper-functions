<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\child_fork;
use function Takuya\Helpers\Shell\ps_stat;

class ChildForkTest extends TestCase{
  public function test_child_fork(){
    child_fork(fn($pid)=>sleep(10),function($cpid){
      
      $this->assertTrue(posix_kill($cpid,0)); // ensure forked
      $this->assertTrue(ps_stat($cpid));// ensure sleeping
      $this->assertTrue(posix_kill($cpid,SIGINT));
      pcntl_waitpid($cpid,$st);
      $this->assertEquals(SIGINT,$st);
    });
  }
}