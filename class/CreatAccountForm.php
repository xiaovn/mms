<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 7/8/13
 * Time: 10:56 AM
 * To change this template use File | Settings | File Templates.
 */

?>
<form action="AccountMMS.Class.php" method="post">
<div>
    <table>
        <tr>
            <td>
                User Name
            </td>
            <td>
                <input type="text" maxlength="25" name="username">
            </td>
        </tr>
        <tr>
            <td>
                PassWord
            </td>
            <td>
                <input type="password" maxlength="50" name="password">
            </td>
        </tr>
        <tr>
            <td>
                Confirm PassWord
            </td>
            <td>
                <input type="password" maxlength="50" name="confirmPassword">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value=" Create Account" name="createAccount">
            </td>
        </tr>
    </table>
</div>

</form>
