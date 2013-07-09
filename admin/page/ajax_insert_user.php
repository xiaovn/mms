<?php
/**
 * Project: mms.
 * File name: ajax_insert_user.php
 * Author: sangtd
 * Date: 7/9/13
 * Time: 4:41 PM
 * Email: kenzaki@xiao.vn
 */
include_once "../../class/function.php";
//include_once "../../class/Database.Class.php";
//include_once "../../class/AccountMMS.Class.php";
if(isset($_POST['username']))
{
  //$cc = new \mms\Database();
  $newuser = new \mms\AccountMMS();
  $newid = $newuser->AutoCreateID();
  $username= $_POST['username'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password = md5("123456");
  $group=5;
  $sql_in = "insert into account(`id`,`username`,`email`,`password`,`group`) values ('$newid','$username','$email','$password','$group')";
  mysql_query( $sql_in);
  echo "Complete to create new account!";
}
?>