<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/9/13
 * Time: 11:04 AM
 * To change this template use File | Settings | File Templates.
 */
include_once("../class/function.php");
$connection=new mms\Database();

$Account=new mms\AccountMMS();
$user= $_SESSION['username'];
echo $user;
if($Account->ChangePassword($user,md5($_POST["CurrentPass"]),md5($_POST["password"]),md5($_POST["confirm"])))
{
    header("Location: ../index.php");
}
else header("Location: ../profile.php");
//$Account->ChangePassword("xuanthuongcr",md5("12345679"),md5("123456"),md5("123456"));