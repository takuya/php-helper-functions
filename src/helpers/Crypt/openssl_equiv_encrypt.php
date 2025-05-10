<?php

namespace Takuya\Helpers\Crypt;

if ( !function_exists( __NAMESPACE__.'\\openssl_equiv_encrypt' ) ) {
  /**
   * OpenSSL で base64 で暗号化したものを平文に戻す。
   * `openssl enc -e -aes-256-cbc -pbkdf2 -iter ((1000*1000)) -in $f_in -out $f_out-k $pass -base64`
   * @param string $data plain text or filename.
   * @param string $pass
   * @param int    $iter
   * @param string $cipher
   * @return bool|string base64 encoded encrypted string. or false
   */
  function openssl_equiv_encrypt ( string $data, string $pass, int $iter = 1000*1000,
                                   string $cipher = "AES-256-CBC" ): bool|string {
    $salt_len = 8;
    do {
      $salt = openssl_random_pseudo_bytes( $salt_len, $strong );
    } while ( empty( $strong ) );
    $key_len = openssl_cipher_key_length( $cipher );
    $iv_len = openssl_cipher_iv_length( $cipher );
    $key_and_iv = openssl_pbkdf2( $pass, $salt, $key_len + $iv_len, $iter, 'sha256' );
    $key = substr( $key_and_iv, 0, $key_len );
    $iv = substr( $key_and_iv, $key_len, $iv_len );
    
    $enc_str = openssl_encrypt( file_exists( $data ) ? file_get_contents( $data ) : $data, $cipher, $key, OPENSSL_RAW_DATA, $iv );
    if ( $enc_str === false ) {
      throw new \RuntimeException( 'Unable to encrypt data' );
    }
    $enc_str = 'Salted__'.$salt.$enc_str;
    return chunk_split( base64_encode( $enc_str ), 64 );
  }
}
