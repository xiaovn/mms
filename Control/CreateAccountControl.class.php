<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 1:51 PM
 * To change this template use File | Settings | File Templates.
 */


//error_reporting(E_ERROR | E_WARNING | E_PARSE);;


include_once("../class/Database.Class.php");
include_once "../config.php";
include_once("../class/AccountMMS.Class.php");
$connect = new \mms\Database();
$createAccount=new \mms\AccountMMS();
 echo $createAccount->CreateAccount("12345678","xuanthuong","123456s",1,"123456");
$a= $createAccount->Login("xuanthuong","123456");
$ui=mysql_fetch_array($a);
echo $ui["id"];

