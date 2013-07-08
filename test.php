<?php
/**
 * Project: mms.
 * File name: test.php
 * Author: sangtd
 * Date: 7/8/13
 * Time: 10:21 AM
 * Email: kenzaki@xiao.vn
 */
include_once("./class/Database.Class.php");
$connect = new \mms\Database();
$info = @mysql_query("SELECT * FROM `info` WHERE id='312157777'");
$ui = @mysql_fetch_array( $info );
echo $ui['fullname'];