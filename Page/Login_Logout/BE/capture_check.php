<?php
$capture = $_POST['capture_code'];


if ($capture == $_SESSION['capture'.$_SESSION['ID']] )
    {
        echo 1;
    }
else
    {
        echo 0;
    }




?>
