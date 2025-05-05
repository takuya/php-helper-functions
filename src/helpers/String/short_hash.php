<?php
namespace Takuya\Helpers\String;
if ( !function_exists( __NAMESPACE__.'\\short_hash')){
  /**
   *  アルファベットでハッシュ化して文字列を５文字に置き換える。
   *   5文字の通り数は64^5 = (2^6)^5 = 2^30 = (2^10)^3 = 1024^3 = 1G
   *   １G件があるが、その１万分の１でコリジョンする。
   * 　５文字なら10万件くらいから衝突が発生する
   * 　１万件くらいなら衝突しない。　
   * ```php
   *   <?php
   *   $ret = [];
   *   foreach ( range(0,99999) as $item ) {
   *     $ret[] = short_hash(random_bytes(1024));
   *   }
   *   $ret = array_unique($ret);
   *   dd(sizeof($ret));
   *  ``` * @param $data
   * @param $len
   * @return string
   */
  
  function short_hash ( $data, $len = 5, $split = 6 ): string {
    return implode(
      '-',
      str_split(
        substr( base64url_encode( hash( 'sha256', $data, true ) ), 0, $len ),
        $split ) );
  }
}
