<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 9:14 AM
 * To change this template use File | Settings | File Templates.
 */

class AccountMMS {

    function testAccountExist($UserName){
        $q="SELECT * FROM `account` WHERE username =' ".$UserName." '";
        $countRecord=mysql_num_rows(mysql_query($q));
        if($countRecord==0){
            return true;
        }
        else return false;

    }
    function CreateAccount($id,$userName,$passWord,$group){
        if(self::testAccountExist($userName)==true){
            $q="INSERT INTO `account`(`id`, `username`, `password`, `group`) VALUES ('".$id."','".$userName."','".$passWord."',".$group.")";
        }
    }
}