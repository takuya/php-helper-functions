<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\ps_stat;

class PsStatTest extends TestCase{
  public function test_ps_stat(){
    $child_pid = pcntl_fork();
    if( $child_pid < 0 ) {
      throw new \RuntimeException('fork failed');
    }
    if ($child_pid===0){
      sleep(1000);
    }
    //
    usleep(100);
    posix_kill($child_pid,0) || throw  new \RuntimeException('check fork(): failed');
    $this->assertTrue(ps_stat($child_pid));
    posix_kill($child_pid,SIGINT) || throw  new \RuntimeException('kill() child: failed');
    pcntl_wait($st);
    $this->assertFalse(posix_kill($child_pid,0));
    $this->assertEquals(SIGINT,$st);
    $this->assertFalse(ps_stat($child_pid));
    
  }
}