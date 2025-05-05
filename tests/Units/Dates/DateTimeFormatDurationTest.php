<?php
namespace Takuya\Tests\Units\Dates;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Dates\date_time_format_duration;

class DateTimeFormatDurationTest extends TestCase{
  public function test_date_time_format_duration(){
    $this->assertEquals( "00:00:00", date_time_format_duration( 0 ) );
    $this->assertEquals( "01:02:01", date_time_format_duration( 3600 + 121 ) );
  }
}