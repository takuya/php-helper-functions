<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;

use function Takuya\Helpers\String\base64url_decode;
use function Takuya\Helpers\String\base64url_encode;

class Base64UrlTest extends TestCase{
  public function test_base64_url(){
    foreach ( range( 1, 10240, 3 ) as $size ) {
      $ret = base64url_decode(base64url_encode($data = random_bytes($size)));
      $this->assertEquals($data,$ret,);
    }
  }
}