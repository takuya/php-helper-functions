<?php

namespace Takuya\Tests\Units\Crypt;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Crypt\openssl_cmd_decrypt;
use function Takuya\Helpers\String\str_rand;
use function Takuya\Helpers\Crypt\openssl_cmd_encrypt;
use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;
use function Takuya\Helpers\FileSystem\temp_file;
use function Takuya\Helpers\String\str_lines;
use function Takuya\Helpers\String\cjoin;

class OpensslCmdDecryptTest extends TestCase {
  public function test_openssl_cmd_decrypt () {
    temp_file( callback: function( $fname ) {
      $call_openssl_enc_e = function( $plain_text_file, $passphrase, $iter ) {
        $cmd = array_replace_entry( array_replace_entry( array_replace_entry(
          csplit( 'openssl enc -e -aes-256-cbc -pbkdf2 -iter %COUNT% -in %IN% -out - -k %PASS% -base64', ' ' ),
          '%COUNT%', $iter ), '%PASS%', $passphrase ), '%IN%', $plain_text_file );
        $proc_res = proc_open( $cmd, [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $stdio );
        $out = stream_get_contents( $stdio[1] );
        if ( proc_get_status( $proc_res )['exitcode'] > 0 ) {
          throw new \Exception( 'openssl enc encrypt failed' );
        }
        return $out;
      };
      //
      file_put_contents( $fname, $plain_str = str_rand( 1024 ) );
      $secret_value = $call_openssl_enc_e( $fname, $pass = str_rand( 100 ), $iter = 1000 );
      
      $ret = openssl_cmd_decrypt( $secret_value, $pass, $iter );
      $this->assertEquals( $plain_str, $ret );
    } );
  }
}