<?php
/**
 * Project: mms.
 * File name: function.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 4:57 PM
 * Email: kenzaki@xiao.vn
 */
include_once "Database.Class.php";
include_once "AccountMMS.Class.php";
include_once "Contact.Class.php";
include_once "Info.Class.php";
include_once "Member.Class.php";
include_once "MetaMMS.Class.php";
include_once "translate.class.php";
$conn = new \mms\Database();
function get_gravatar( $email, $img = false, $s = 80, $d = 'mm', $r = 'r', $atts = array() )
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
?>