<?php
session_start();
$capture = $_POST['capture_code'];

if ($capture == $_SESSION['capture'.$_COOKIE['ID']] ){
    echo 1;
}
else
{
    echo 0;
}
?>