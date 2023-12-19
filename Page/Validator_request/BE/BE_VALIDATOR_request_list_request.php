
<?php
    include "MySql.php";
    $db = new connect_DB($_SESSION['db_host'], $_SESSION['db_dbname'], $_SESSION['db_user'], $_SESSION['db_pass']);
    $qr= new Query("mongonv2");
    //=====load table translation request=====
    function load_data_request($db, $qr)
    {
        $result= $qr->select_request_user($db, "request", $_SESSION['ID']);
        if (!$result)
            {
                die ('InCorrect');
            }
        else
            {
                return $result;
            }
    } 
?>
<html> 
    <table id="myTable_Translation_Request_info_manager" style= "border-collapse:collapse;" border =1px; >
        <thead id ="thead_a" class="sticky-thead"> 
                <th>NO</th>
                <th>Request_Number</th>
                <th>Status</th>
                <th>Requester</th>
                <th>Date Issue</th>
                <th>Deadline</th>
        </thead>
        <tbody>
            <?php
                $data=load_data_request($db, $qr);
                $count_row=0;     
                $count_col=0; 
                while ($row = mysqli_fetch_assoc($data))
                {              
                    $count_row=$count_row+1;
                    $count_col=$count_col+1;
                    echo "<tr>";
            
                    foreach ($row as $key=>$value)
                    {
                        if($key!=="user" and strpos($row['requestnumber'], "VL") !== false ){
                            if ($key == 'requestnumber'){
                                echo "<td id ='test".$count_row."_".$count_col."' class = 'list_request' style = 'text-decoration:underline ;cursor:pointer'>".$value."</td>";
                            }
                            else{
                                echo "<td id ='test".$count_row."_".$count_col."'>".$value."</td>";
                            }
                        }
                    }                  
                    echo "</tr>";
                }

            ?>
            
        </tbody>
    </table>

</html>
