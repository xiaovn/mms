<?php
/**
 * Project: mms.
 * File name: Member.Class.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 4:01 PM
 * Email: kenzaki@xiao.vn
 */

namespace mms;


class MemberClass {
  public function get_gravatar( $email, $img = false, $s = 80, $d = 'mm', $r = 'g', $atts = array() )
  {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
      $url = '<img class="gravatar thumbnail" src="' . $url . '"';
      foreach ( $atts as $key => $val )
        $url .= ' ' . $key . '="' . $val . '"';
      $url .= ' />';
    }
    return $url;
  }
}