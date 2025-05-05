<?php
namespace Takuya\Tests\Units\Dates;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Dates\date_duration_to_int;

class DateDurationToIntTest extends TestCase{
  public function test_date_duration_to_int(){
    $this->assertEquals( 23, date_duration_to_int( '00:00:23' ) );
    $this->assertEquals( 3623, date_duration_to_int( '01:00:23' ) );
  }
}