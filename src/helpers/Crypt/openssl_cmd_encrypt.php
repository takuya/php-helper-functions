<?php

namespace Takuya\Helpers\Crypt;

use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;

if ( !function_exists( __NAMESPACE__.'\\openssl_cmd_encrypt' ) ) {
  function openssl_cmd_encrypt ( string $data, string $pass, $iter = 1000*1000, $cipher = '-aes-256-cbc' ): string {
    // build command
    $cmd = csplit( 'openssl enc -e %CIPHER% -pbkdf2 -iter %COUNT% -in - -out - -k %PASS% -base64', ' ' );
    $cmd = array_replace_entry( $cmd, '%COUNT%', $iter );
    $cmd = array_replace_entry( $cmd, '%PASS%', $pass );
    $cmd = array_replace_entry( $cmd, '%CIPHER%', $cipher );
    // run
    $res = proc_open( $cmd, [['pipe', 'r'], ['pipe', 'w'], ['pipe', 'w']], $stdio );
    fwrite( $stdio[0], $plain_text = file_exists( $data ) ? file_get_contents( $data ) : $data );
    fclose( $stdio[0] );
    $out = stream_get_contents( $stdio[1] );
    if ( proc_get_status( $res )['exitcode'] > 0 ) {
      throw new \RuntimeException( "openssl enc failed:".stream_get_contents( $stdio[2] ) );
    }
    return $out;
  }
}
