
<?php
    $email_info = (string)$_POST["email"];
    $pass_info = (string)$_POST["pass"];
    $pass_info_encode = hash("sha256", $pass_info);

    // Get database info
    require_once "../../vendor/autoload.php";
    use SecureEnvPHP\SecureEnvPHP;
    (new SecureEnvPHP())->parse('../../.env.enc', '../../.env.key');

        $_SESSION['db_host'] = getenv('DB_HOST');
        $_SESSION['db_dbname'] = getenv('DB_DATABASE');
        $_SESSION['db_user'] = getenv('DB_USER');
        $_SESSION['db_pass'] = getenv('DB_PASSWORD');

        $_SESSION['mail_host'] = getenv('MAIL_HOST');
        $_SESSION['mail_user'] = getenv('MAIL_USER');
        $_SESSION['mail_pass'] = getenv('MAIL_PASS');
    
    include "../../Translation_Request/BE/MySql.php";
    $db = new connect_DB($_SESSION['db_host'],$_SESSION['db_dbname'],$_SESSION['db_user'],$_SESSION['db_pass']);
    $qr= new Query("mongonv2");

    // Get data from database
    $record_user = $qr -> select_data($db,"user");
    $user = []; 
    while ($row = mysqli_fetch_assoc($record_user))
        {
            $user[$row['mail']]['ID'] = $row['id'];
            $user[$row['mail']]['pass'] = $row['password'];
            $user[$row['mail']]['type'] = $row['type'];
            $user[$row['mail']]['sect'] = $row['sect'];
            $user[$row['mail']]['name'] = $row['name'];
        };

    if ($pass_info_encode == $user[$email_info]['pass'] and $user[$email_info]['userStatus'] == 'unblocked')
        {
            $session_name = "email";
            $session_value = $email_info;
            $_SESSION[$session_name] = $session_value;

            $session_name = "pass";
            $session_value = $pass_info;
            $_SESSION[$session_name] = $session_value;

            $session_name = "name";
            $session_value = $user[$email_info]['name'];
            $_SESSION[$session_name] = $session_value;
            
            $session_name = "type";
            $session_value = $user[$email_info]['type'];
            $_SESSION[$session_name] = $session_value;

            $session_name = "ID";
            $session_value = $user[$email_info]['ID'];
            $_SESSION[$session_name] = $session_value;

            $session_name = "sect";
            $session_value = $user[$email_info]['sect'];
            $_SESSION[$session_name] = $session_value;
            // Login sucess
            echo 1;
        }
    else 
        {
            echo 0;
        }

?>



