<?php
/**
 * Project: mms.
 * File name: Info.Class.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 9:58 AM
 * Email: kenzaki@xiao.vn
 */

namespace mms;
include_once "Database.Class.php";
class InfoClass{
  public function SetName($uid,$name)
  {
    mysql_query("UPDATE `info` SET `fullname` = '{$name}' WHERE id='{$uid}' LIMIT 1;");
  }
  public function SetPhone($uid,$phone)
  {
    mysql_query("UPDATE `info` SET `phone` = '{$phone}' WHERE id = '{$uid}' LIMIT 1");
  }
  public function SetSex($uid,$sex)
  {
    mysql_query("UPDATE `info` SET `sex` = '{$sex}' WHERE id = '{$uid}' LIMIT 1");
  }
  public function SetBirthday($uid,$bd)
  {
    mysql_query("UPDATE `info` SET `birthday` = '{$bd}' WHERE id = '{$uid}' LIMIT 1");
  }
  public function SetAdd($uid,$add)
  {
    mysql_query("UPDATE `info` SET `add` = '{$add}' WHERE id = '{$uid}' LIMIT 1");
  }
  public function SetEmail($uid,$email)
  {
    mysql_query("UPDATE `info` SET `email` = '{$email}' WHERE id = '{$uid}' LIMIT 1");
  }
  public function GetInfo($unit,$uid)
  {
    $info = @mysql_query("SELECT * FROM `info` WHERE id='{$uid}'");
    $ui = @mysql_fetch_array( $info );
    switch($unit)
    {
      case "fullname":
        return $ui['fullname'];
        break;
      case "email":
        //return "abcd";
        return $ui['email'];
        break;
      case "sex":
        return $ui['sex'];
        break;
      case "phone":
        return $ui['phone'];
        break;
      case "add":
        return $ui['add'];
        break;
      default:
        break;
    }
  }
}