<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 9:15 AM
 * To change this template use File | Settings | File Templates.
 */
namespace mms;
class MetaMMS {
    function CreateMeta($metaName){
           $q="select * from where 'metaname'=''".$metaName."'";
            if(mysql_num_rows(mysql_query($q))==0){
                $q="insert into 'meta'('metaname') values ('".$metaName."')";
                mysql_query($q);
            }
            else return false;
        }
    function DeleteMeta($metaName){
        $q="select * from 'meta' where 'metaname'=''".$metaName."'";
        if(mysql_num_rows(mysql_query($q))==1){
        $q="DELETE FROM `meta` WHERE 'metaname'='".$metaName."'";
        mysql_query($q);
        }
        else return false;
    }
    function getMeta(){
        return $result=mysql_query("select * from 'meta'");
    }
}