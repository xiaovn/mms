<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 9:14 AM
 * To change this template use File | Settings | File Templates.
 */
namespace mms;
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
            mysql_query($q);

        }
    }
     function DeleteAccount($UserName){
         $q="DELETE FROM `account` WHERE username='".$UserName."'";
         mysql_query($q);
     }
     function ChangePassword($username,$passWord,$newPassWord){
           $q="select * from 'account' where 'username'='".$username."' and 'password'='".$passWord."'";
         if(mysql_num_rows(mysql_query($q))==1){
              $q="UPDATE `account` SET `password'='".$newPassWord."' where 'username'='".$username."'";
              mysql_query($q);
         }
         else return false;

     }
    function Login($userName,$passWord){
        $q="select * from 'account' where 'username'='".$userName."' and 'password'='".$passWord."'";
        $result=mysql_query($q);
        if(mysql_num_rows($result)==1){
            return $result;
        }
        else return false;
    }
    public function AutoCreateID()
    {
      include_once "Database.Class.php";
      $connect = new Database();
      $id = "";
      do
      {
        $id .= "3121";
        $rdc = rand(1000,9999);
        $id .= $rdc;
        $id .= "7";
      }
      while(mysql_num_rows(mysql_query("SELECT * FROM account WHERE id = '".$id."'")));
      return $id;
    }


}