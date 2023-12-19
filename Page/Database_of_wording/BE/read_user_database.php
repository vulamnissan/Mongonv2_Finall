<?php  

//READ INFOR USER IN TABLE "USER"
    $connect_1 = connect_db($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $result_1 = $qr->select_data($db, "user");
    $count_row = 0;
    $arr = array();

    if ($result_1->num_rows > 0){
        while ($row = $result_1 -> fetch_assoc()){
            $count_row = $count_row + 1;
            $count_col = 0;
            $ind = 0;
            foreach($row as $keys => $data){
                $arr[$ind] = $data;
                $ind = $ind + 1;
            }

            if($arr[1] == $_SESSION['name']){
                echo "<tr>";
                echo "<td> Name </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '",  $arr[1],  "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> Sect </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '",  $arr[3],  "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td> Mail </td>";
                echo "<td><input class = \"sender\" type= \"text\" value = '",  $arr[2],  "'></td>";
                echo "</tr>";
            }
            else{
                continue;
            }
}
}
$connect_1 -> close();

?>
