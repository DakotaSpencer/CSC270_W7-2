
<?php

include_once "MyHeader.php";

// Use this page to change the value of
//$_COOKIE["MyStyle"] or such
?>

<form action="Preferences.php" method="post">
    <table>
        <tr>
            <td>
                <button class="fancyButton">
                  <a href="Preferences.php?style=1" name="1">Light Mode</a>  
                </button>
            </td>
            <td>
                <button class="fancyButton">                
                    <a href ="Preferences.php?style=2" name="2">Dark Mode</a>
                </button>
            </td>
            <td>
                <button class="fancyButton">
                    <a href="Preferences.php?style=3" name="3">Other</>
                </button>
            </td>
        </tr>
    </table>
</form>

Add code (form) to change style preferences.




