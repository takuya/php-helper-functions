<?php

namespace Takuya\Helpers\Crypt;

use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;

if ( !function_exists( __NAMESPACE__.'\\openssl_cmd_decrypt' ) ) {
  function openssl_cmd_decrypt ( string $data, string $pass, $iter = 1000*1000 ): string {
    $secret_value = file_exists( $data ) ? file_get_contents( $data ) : $data;
    // build command
    $cmd = csplit( 'openssl enc -d -aes-256-cbc -pbkdf2 -iter %COUNT% -in - -out - -k %PASS% -base64', ' ' );
    $cmd = array_replace_entry( $cmd, '%COUNT%', $iter );
    $cmd = array_replace_entry( $cmd, '%PASS%', $pass );
    // run
    $res = proc_open( $cmd, [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $stdio );
    fwrite( $stdio[0], $secret_value );
    fclose( $stdio[0] );
    $out = stream_get_contents( $stdio[1] );
    $err = stream_get_contents( $stdio[2] );
    if ( proc_get_status( $res )['exitcode'] > 0 ) {
      throw new \RuntimeException( "openssl enc failed: {$err}" );
    }
    return $out;
  }
}
