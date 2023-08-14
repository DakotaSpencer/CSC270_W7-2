<?php
// include_once "dbConnector.php";
?>

<?php
// //////////////////////////////////////////////////

// /////////////////
function PageDisplay($PageData) {

    if ($PageData){
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        $row = mysqli_fetch_array($PageData);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header1'] .  ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['Text1'] .  '</p> <br />';

    } // End if
    else {
        echo "No Page data to display <br />";
    }

}

function SearchDisplay($SearchData){
    if($SearchData){
        $row = mysqli_fetch_array($SearchData);

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header1'] . ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['Text1'] . '</p> <br />';

    } // End if
    else {
        echo "No Search data to display <br />";
    }
}
function swapStyle($id)
{
    $myStyle = '0';
        switch($id)
        {
            case 1:
                $_COOKIE["MyStyle"] = '1';

                setcookie("MyStyle", $myStyle,time() + 86400, "/");
                break;
            case 2:
                $_COOKIE["MyStyle"] = '2';
                setcookie("MyStyle", $myStyle,time() + 86400, "/");
                break;
            case 3:
                $_COOKIE["MyStyle"] = '3';
                setcookie("MyStyle", $myStyle,time() + 86400, "/");
                break;
            default:
                $_COOKIE["MyStyle"] = '1';
                setcookie("MyStyle", $myStyle,time() + 86400, "/");
                break;
        }
        //__DIR__ . "index.php";
}
?>