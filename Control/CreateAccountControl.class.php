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
 echo $createAccount->CreateAccount("36985635","xuanthuongcr","123456","123456","xuanthuongcr@gmail.com",2);
$a= $createAccount->Login("xuanthuongcr",md5("123456"));
$ui=mysql_fetch_array($a);
echo $ui["id"];

