<?php

namespace Takuya\Tests\Units\Crypt;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Crypt\openssl_cmd_encrypt;
use function Takuya\Helpers\String\str_rand;
use function Takuya\Helpers\FileSystem\mktempfile;
use function PHPUnit\Framework\callback;
use function Takuya\Helpers\FileSystem\temp_file;
use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;

class OpensslCmdEncryptTest extends TestCase {
  public function test_openssl_cmd_encrypt () {
    temp_file( callback: function( $fname ) {
      $ret = openssl_cmd_encrypt( $plain = str_rand( 1024 ), $pass = str_rand( 30 ), $iter = 1000 );
      file_put_contents( $fname, $ret );
      //
      $call_openssl_enc_d = function( $secret_file, $passphrase, $iter ) {
        $cmd = array_replace_entry( array_replace_entry( array_replace_entry(
          csplit( 'openssl enc -d -aes-256-cbc -pbkdf2 -iter %COUNT% -in %IN% -out - -k %PASS% -base64', ' ' ),
          '%COUNT%', $iter ), '%PASS%', $passphrase ), '%IN%', $secret_file );
        $proc_res = proc_open( $cmd, [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $stdio );
        $out = stream_get_contents( $stdio[1] );
        if ( proc_get_status( $proc_res )['exitcode'] > 0 ) {
          throw new \Exception( 'decrypt failed' );
        }
        return $out;
      };
      //
      $this->assertEquals( 'Salted__', substr( base64_decode( $ret ), 0, 8 ) );
      $this->assertEquals( $plain,$call_openssl_enc_d( $fname, $pass, $iter ));
    } );
  }
}