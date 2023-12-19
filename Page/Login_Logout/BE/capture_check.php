<?php
$capture = $_POST['capture_code'];
$token = filter_input(INPUT_POST, 'token');

if (empty($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) 
    {
	echo -1;
    }
else
    {
        if ($capture == $_SESSION['capture'.$_SESSION['ID']] )
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }



?>
