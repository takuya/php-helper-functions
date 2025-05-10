<?php
namespace Takuya\Tests\Units\Crypt;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Crypt\openssl_equiv_decrypt;
use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;
use function Takuya\Helpers\String\str_rand;

class OpensslEquivDecryptTest extends TestCase{
  public function test_openssl_equivalent_decrypt(){
    $enc_data = "U2FsdGVkX196swnbh3ABbOolawdPCF2JF0G5E/R7p3GODvrAMnnPITWUe6WEotnx";
    $pass="my_strong_password";
    $iter=1000*1000;
    $plain_text = openssl_equiv_decrypt($enc_data,$pass,$iter);
    //
    $this->assertEquals("ABC=EDF=BBBB=CCC=XXXX",$plain_text);
  }
  public function test_encrypt_by_openssl_enc_command_decrypt_by_php () {
    // build command
    $cmd = csplit('openssl enc -e -aes-256-cbc -pbkdf2 -iter %COUNT% -in - -out - -k %PASS% -base64',' ');
    $cmd =array_replace_entry($cmd,'%COUNT%', $iter=1000*1000);
    $cmd =array_replace_entry($cmd,'%PASS%', $pass=str_rand(100));
    // run
    $res = proc_open($cmd,[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']],$stdio);
    fwrite($stdio[0],$text=random_bytes(1024));
    fclose($stdio[0]);
    $out = stream_get_contents($stdio[1]);
    // main
    $dec = openssl_equiv_decrypt($out,$pass,$iter);
    // ensure decrypted.
    $this->assertEquals($text,$dec);
  }
  
}