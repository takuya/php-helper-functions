<?php
namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\str_head' ) ) {
  function str_head ( string $str, int $n ): string {
    $str_io = new \SplTempFileObject( strlen( $str ) );
    $str_io->fwrite( $str );
    $str_io->rewind();

    $out = new \SplTempFileObject();
    //
    foreach ( range( 1, $n ) as $i ) {
      $out->fwrite( $str_io->getCurrentLine() );
    }
    $size = $out->ftell();
    $out->rewind();

    return $out->fread( $size );
  }
}
