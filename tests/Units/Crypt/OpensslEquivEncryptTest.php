<?php

namespace Takuya\Tests\Units\Crypt;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Crypt\openssl_equiv_encrypt;
use function Takuya\Helpers\Crypt\openssl_equiv_decrypt;
use function Takuya\Helpers\String\str_rand;
use function Takuya\Helpers\Crypt\openssl_cmd_decrypt;
use function Takuya\Helpers\FileSystem\mktempfile;

class OpensslEquivEncryptTest extends TestCase {
  public function test_openssl_equiv_encrypt () {
    [$plain_str, $pass] = ['This should be encrypted', 'strong-password'];
    $enc = openssl_equiv_encrypt( $plain_str, $pass );
    $ret = openssl_equiv_decrypt( $enc, $pass );
    $this->assertEquals( $plain_str, $ret );
  }
  
  public function test_encrypt_by_php_decrypt_by_openssl_enc_command () {
    // main
    $secret_value = openssl_equiv_encrypt( $plain_text = random_bytes( 1024 ), $pass = str_rand( 100 ), $iter = 1000*1000 );
    file_put_contents($tmp=mktempfile(),$secret_value);
    $decrypted = openssl_cmd_decrypt( $tmp, $pass, $iter );
    //
    $this->assertEquals( $plain_text, $decrypted );
  }
}