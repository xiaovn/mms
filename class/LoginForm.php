<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 1:19 PM
 * To change this template use File | Settings | File Templates.
 */
namespace mms;

?>
<form action="AccountMMS.Class.php" method="post">
    <div>
        <table>
            <tr>
                <td>
                    User Name
                </td>
                <td>
                    <input type="text" name="UserName">
                </td>
            </tr>
            <tr>
                <td>
                    PassWord
                </td>
                <td>
                    <input type="password" name="PassWord">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Login" name="Login">
                </td>
            </tr>
        </table>
    </div>
</form>