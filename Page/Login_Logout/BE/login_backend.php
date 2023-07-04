
<?php
    session_start();
    $email_info = (string)$_POST["email"];
    $pass_info = (string)$_POST["pass"];
    
    include "connect_database.php";
    $db = connect_db('localhost','mongonv2','root','');
    // get data from database
    $sql_user = "SELECT * FROM user";
    $record_user = $db -> query($sql_user);
    
    $user = []; 
    while ($row = mysqli_fetch_assoc($record_user))
    {
        $user[$row['mail']]['ID'] = $row['id'];
        $user[$row['mail']]['pass'] = $row['password'];
        $user[$row['mail']]['type'] = $row['type'];
        $user[$row['mail']]['sect'] = $row['sect'];
        $user[$row['mail']]['name'] = $row['name'];
    };
    // Set cookie
    $cookie_name = "email";
    $cookie_value = $email_info;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    $cookie_name = "pass";
    $cookie_value = $pass_info;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    //Check info dang nhap

    if ($pass_info == $user[$email_info]['pass'])
    {
        $cookie_name = "name";
        $cookie_value = $user[$email_info]['name'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        $cookie_name = "type";
        $cookie_value = $user[$email_info]['type'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        $cookie_name = "ID";
        $cookie_value = $user[$email_info]['ID'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        //Login sucess
        echo 1;
    }
    else 
    {
        echo 0;
    }

?>



