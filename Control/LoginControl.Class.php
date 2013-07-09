
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 4:30 PM
 * To change this template use File | Settings | File Templates.
 */


//include_once("../login.php");
include_once("../config.php");
include_once("../class/AccountMMS.Class.php");
include_once("../class/Database.Class.php");

$connection=new mms\Database();

$Account=new mms\AccountMMS();

$result=$Account->Login($_POST["username"],$_POST["password"]);

if($result==false){
    header("Location: ../login.php");
}
else
    header("Location: ../index.php");

?>

